@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-md-5" style="background-color: #f8fafc; min-height: 100vh;">

    {{-- 1. KARTU STATISTIK (4 KOLOM) --}}
    <div class="row g-3 mb-4">
        {{-- Total Pendapatan --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background-color: #ffeef0;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">Total Pendapatan</small>
                        <h3 class="fw-bold text-dark my-1">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</h3>
                        <small class="text-muted" style="font-size: 0.8rem;">Hari ini</small>
                    </div>
                    <div class="rounded-3 p-3 text-danger d-flex align-items-center justify-content-center" style="background-color: #ffdada; width: 50px; height: 50px;">
                        <i class="bi bi-wallet2 fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Transaksi --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background-color: #eafaf1;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">Total Transaksi</small>
                        <h3 class="fw-bold text-success my-1">{{ $totalTransaksi ?? 0 }} Pesanan</h3>
                        <small class="text-muted" style="font-size: 0.8rem;">Hari ini</small>
                    </div>
                    <div class="rounded-3 p-3 text-success d-flex align-items-center justify-content-center" style="background-color: #d4f4e2; width: 50px; height: 50px;">
                        <i class="bi bi-bag-check fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Perlu Diproses --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100" style="background-color: #fff9e6;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">Perlu Diproses</small>
                        <h3 class="fw-bold text-warning my-1" style="color: #b7791f !important;">{{ $perluDiproses ?? 0 }} Pesanan</h3>
                        <small class="text-muted" style="font-size: 0.8rem;">Menunggu diproses</small>
                    </div>
                    <div class="rounded-3 p-3 text-warning d-flex align-items-center justify-content-center" style="background-color: #fef08a; width: 50px; height: 50px;">
                        <i class="bi bi-hourglass-split fs-4" style="color: #b7791f;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Varian Menu --}}
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-dark text-white">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-white-50 fw-semibold">Varian Menu</small>
                        <h3 class="fw-bold text-white my-1">{{ $totalMenu ?? 16 }} Item</h3>
                        <small class="text-white-50" style="font-size: 0.8rem;">Total tersedia</small>
                    </div>
                    <div class="rounded-3 p-3 bg-secondary bg-opacity-50 text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="bi bi-cup-hot fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. KONTEN TIGA KOLOM --}}
    <div class="row g-4 mb-4">
        
        {{-- KOLOM 1: Menu Terlaris --}}
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-star-fill text-danger me-2"></i>
                        <h6 class="fw-bold text-dark mb-0">Menu Terlaris</h6>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        {{-- Item 1 --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger-subtle text-danger rounded-circle p-2" style="width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-size: 0.75rem;">1</span>
                                <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=100&q=80" class="rounded-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Ice Kopi">
                                <div>
                                    <div class="fw-bold text-dark small" style="line-height: 1.2;">Ice Kopi Susu Gula Aren</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">24 terjual</small>
                                </div>
                            </div>
                            <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1" style="font-size: 0.7rem;">Minuman</span>
                        </div>

                        {{-- Item 2 --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger-subtle text-danger rounded-circle p-2" style="width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-size: 0.75rem;">2</span>
                                <img src="https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=100&q=80" class="rounded-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Hot Kopi">
                                <div>
                                    <div class="fw-bold text-dark small" style="line-height: 1.2;">Kopi Susu Hot</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">18 terjual</small>
                                </div>
                            </div>
                            <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1" style="font-size: 0.7rem;">Minuman</span>
                        </div>

                        {{-- Item 3 --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger-subtle text-danger rounded-circle p-2" style="width:24px; height:24px; display:flex; align-items:center; justify-content:center; font-size: 0.75rem;">3</span>
                                <img src="https://images.unsplash.com/photo-1584776296944-ab6fb57b0bdd?auto=format&fit=crop&w=100&q=80" class="rounded-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Roti Bakar">
                                <div>
                                    <div class="fw-bold text-dark small" style="line-height: 1.2;">Roti Bakar Coklat Keju</div>
                                    <small class="text-muted" style="font-size: 0.75rem;">15 terjual</small>
                                </div>
                            </div>
                            <span class="badge bg-danger-subtle text-danger rounded-pill px-2 py-1" style="font-size: 0.7rem;">Makanan</span>
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-top mt-3">
                    <a href="{{ route('menu.index') }}" class="text-danger fw-semibold text-decoration-none small">
                        Lihat Semua Menu Terlaris <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- KOLOM 2: Transaksi Terbaru --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-list-task text-danger me-2"></i>
                        <h6 class="fw-bold text-dark mb-0">Transaksi Terbaru</h6>
                    </div>
                    <a href="{{ route('transaksi.riwayat') }}" class="text-danger fw-semibold text-decoration-none small">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0" style="font-size: 0.85rem;">
                        <thead class="text-muted border-bottom">
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Pelanggan / Meja</th>
                                <th>Waktu</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksiTerbaru ?? [] as $trx)
                                <tr>
                                    <td class="fw-bold text-danger">{{ $trx->kode_transaksi }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $trx->nama_pelanggan ?? 'Pelanggan Umum' }}</div>
                                        <small class="text-muted">Meja: {{ $trx->nomor_meja ?? '-' }}</small>
                                    </td>
                                    <td class="text-muted">{{ \Carbon\Carbon::parse($trx->created_at)->diffForHumans() }}</td>
                                    <td class="fw-bold text-success">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($trx->status == 'diproses')
                                            <span class="badge px-3 py-1 rounded-pill" style="background-color: #fef08a; color: #b7791f;">
                                                <i class="bi bi-hourglass-split me-1"></i> Diproses
                                            </span>
                                        @else
                                            <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">
                                                <i class="bi bi-check-circle me-1"></i> Selesai
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        Belum ada transaksi terjadi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- KOLOM 3: Ringkasan Hari Ini --}}
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-clock-history text-danger me-2"></i>
                    <h6 class="fw-bold text-dark mb-0">Ringkasan Hari Ini</h6>
                </div>

                <div class="d-flex flex-column gap-3 py-2">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-muted small">Pendapatan</span>
                        <span class="fw-bold text-dark small">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-muted small">Transaksi</span>
                        <span class="fw-bold text-dark small">{{ $totalTransaksi ?? 0 }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-muted small">Pesanan Diproses</span>
                        <span class="fw-bold text-dark small">{{ $perluDiproses ?? 0 }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted small">Item Terjual</span>
                        <span class="fw-bold text-dark small">{{ $totalItemTerjual ?? 1 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. TIPS HARI INI BANNER --}}
    <div class="card border-0 rounded-4 shadow-sm p-3" style="background: linear-gradient(135deg, #fff0f3 0%, #ffe3e8 100%);">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle p-3 bg-white text-danger shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-cup-hot-fill fs-4"></i>
            </div>
            <div>
                <h6 class="fw-bold text-danger mb-1">Tips Hari Ini</h6>
                <p class="text-muted mb-0 small">Jangan lupa untuk selalu mengecek stok bahan baku agar penjualan tetap berjalan lancar dan pelanggan puas!</p>
            </div>
        </div>
    </div>

</div>
@endsection