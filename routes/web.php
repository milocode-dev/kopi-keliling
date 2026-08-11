<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Landing Page Pelanggan
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// 2. Dashboard Admin / Kasir
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 3. Master Data
Route::resource('kategori', KategoriController::class);
Route::resource('menu', MenuController::class);

// 4. POS Kasir & Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/riwayat', [TransaksiController::class, 'riwayat'])->name('transaksi.riwayat');
Route::patch('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.update-status');
Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'cetakStruk'])->name('transaksi.struk');

// 5. Authentication
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 6. Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Route khusus admin dapat ditambahkan di sini.
});

// 7. Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

// 8. Testimoni
Route::post('/testimoni/store', function (Request $request) {
    return back()->with('success', 'Terima kasih! Testimoni berhasil dikirim.');
})->name('testimoni.store');
