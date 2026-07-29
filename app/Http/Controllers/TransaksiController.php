<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    // Menampilkan halaman kasir / pemesanan
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::with('kategori')->get();

        return view('transaksi.index', compact('kategoris', 'menus'));
    }

    // Menyimpan transaksi pesanan
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'nullable|string|max:255',
            'nomor_meja'      => 'nullable|string|max:50',
            'items'           => 'required|array|min:1',
            'items.*.id'      => 'required|exists:menus,id',
            'items.*.jumlah'  => 'required|integer|min:1',
        ]);

        // Generate kode transaksi unik, misal: TRX-20260729-ABCD
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        $totalHarga = 0;
        $detailItems = [];

        // Hitung total dan persiapkan data detail
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

        // 1. Simpan header pesanan
        $pesanan = Pesanan::create([
            'kode_transaksi'    => $kodeTransaksi,
            'nama_pelanggan'    => $request->nama_pelanggan ?? 'Pelanggan Umum',
            'nomor_meja'        => $request->nomor_meja ?? '-',
            'total_harga'       => $totalHarga,
            'status_pembayaran' => 'paid', // Atau 'unpaid' jika bayar nanti
            'status_pesanan'    => 'proses',
        ]);

        // 2. Simpan detail pesanan
        foreach ($detailItems as $detail) {
            $pesanan->detailPesanans()->create($detail);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan! Kode: ' . $kodeTransaksi);
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
}