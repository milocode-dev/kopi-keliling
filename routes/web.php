<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('auth.register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('auth.login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');


/*
|--------------------------------------------------------------------------
| TESTIMONI
|--------------------------------------------------------------------------
*/

Route::post('/testimoni/store', function (Request $request) {

    $request->validate([
        'nama' => 'required|string|max:255',
        'pekerjaan' => 'nullable|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'komentar' => 'required|string',
    ]);

    Testimoni::create([
        'nama' => $request->nama,
        'pekerjaan' => $request->pekerjaan,
        'rating' => $request->rating,
        'komentar' => $request->komentar,
    ]);

    return redirect()->route('home');

})->name('testimoni.store');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('kategori', KategoriController::class);

    Route::resource('menu', MenuController::class);

    Route::get('/transaksi', [TransaksiController::class, 'index'])
        ->name('transaksi.index');

    Route::post('/transaksi', [TransaksiController::class, 'store'])
        ->name('transaksi.store');

    Route::get('/transaksi/riwayat', [TransaksiController::class, 'riwayat'])
        ->name('transaksi.riwayat');

    Route::patch('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])
        ->name('transaksi.update-status');

    Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'cetakStruk'])
        ->name('transaksi.struk');

});