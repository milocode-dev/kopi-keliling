<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // 1. Total Pendapatan hari ini
        $totalPendapatan = Pesanan::whereDate('created_at', $today)
            ->sum('total_harga');
        
        // 2. Ubah variabel menjadi $totalTransaksi agar cocok dengan Blade
        $totalTransaksi = Pesanan::whereDate('created_at', $today)->count();
        
        // 3. Ubah variabel menjadi $perluDiproses agar cocok dengan Blade
        $perluDiproses = Pesanan::whereDate('created_at', $today)
            ->where('status_pesanan', 'proses')
            ->count();
        
        // 4. Total varian menu
        $totalMenu = Menu::count();

        // 5. Ubah variabel menjadi $transaksiTerbaru agar cocok dengan Blade
        $transaksiTerbaru = Pesanan::with('detailPesanans.menu')
            ->whereDate('created_at', $today)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPendapatan',
            'totalTransaksi',
            'perluDiproses',
            'totalMenu',
            'transaksiTerbaru'
        ));
    }
}