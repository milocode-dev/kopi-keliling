<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::with('kategori')->get();

        return view('transaksi.index', compact('kategoris', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'nullable|string|max:255',
            'nomor_meja'     => 'nullable|string|max:50',
            'items'          => 'required|array|min:1',
            'items.*.id'     => 'required|exists:menus,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $pesanan = DB::transaction(function () use ($request) {
            $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(4));
            $totalHarga = 0;
            $detailItems = [];

            foreach ($request->items as $item) {
                $menu = Menu::findOrFail($item['id']);
                $subtotal = $menu->harga * $item['jumlah'];
                $totalHarga += $subtotal;

                $detailItems[] = [
                    'menu_id'  => $menu->id,
                    'jumlah'   => $item['jumlah'],
                    'harga'    => $menu->harga,
                    'subtotal' => $subtotal,
                ];
            }

            $pesananBaru = Pesanan::create([
                'kode_transaksi'    => $kodeTransaksi,
                'nama_pelanggan'    => $request->nama_pelanggan ?? 'Pelanggan Umum',
                'nomor_meja'        => $request->nomor_meja ?? '-',
                'total_harga'       => $totalHarga,
                'status_pembayaran' => 'paid',
                'status_pesanan'    => 'proses',
            ]);

            foreach ($detailItems as $detail) {
                $pesananBaru->detailPesanans()->create($detail);
            }

            return $pesananBaru;
        });

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan! Kode: ' . $pesanan->kode_transaksi);
    }

    public function riwayat()
    {
        $pesanans = Pesanan::with('detailPesanans.menu')->latest()->get();

        return view('transaksi.riwayat', compact('pesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update([
            'status_pesanan' => $request->status_pesanan
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function cetakStruk($id)
    {
        $pesanan = Pesanan::with('detailPesanans.menu')->findOrFail($id);

        return view('transaksi.struk', compact('pesanan'));
    }
}