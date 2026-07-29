<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total pendapatan dari pesanan yang selesai
        $totalPendapatan = Pesanan::where('status_pesanan', 'selesai')->sum('total_harga');
        
        // Hitung total jumlah pesanan
        $totalPesanan = Pesanan::count();
        
        // Pesanan yang masih dalam status proses
        $pesananProses = Pesanan::where('status_pesanan', 'proses')->count();
        
        // Total varian menu yang ada
        $totalMenu = Menu::count();

        // 5 Pesanan terbaru
        $pesananTerbaru = Pesanan::with('detailPesanans.menu')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPendapatan',
            'totalPesanan',
            'pesananProses',
            'totalMenu',
            'pesananTerbaru'
        ));
    }
}