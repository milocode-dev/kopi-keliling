@extends('layouts.app')

@section('title', 'Dashboard - Kopi Gerobakan')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Dashboard Ringkasan</h3>
            <p class="text-muted small mb-0">Overview performa penjualan Kopi Gerobakan hari ini</p>
        </div>
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary fw-bold shadow-sm rounded-3">
            <i class="bi bi-cart-plus me-1"></i> Buka Kasir POS
        </a>
    </div>

    {{-- KARTU STATISTIK --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-primary text-white h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-white-50 small fw-semibold">Total Pendapatan</div>
                        <h4 class="fw-bold mb-0 mt-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-wallet2"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-success text-white h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-white-50 small fw-semibold">Total Transaksi</div>
                        <h4 class="fw-bold mb-0 mt-1">{{ $totalPesanan }} Pesanan</h4>
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-bag-check"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-warning text-dark h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-dark-50 small fw-semibold">Perlu Diproses</div>
                        <h4 class="fw-bold mb-0 mt-1">{{ $pesananProses }} Pesanan</h4>
                    </div>
                    <div class="fs-1 text-dark-50"><i class="bi bi-hourglass-split"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-dark text-white h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-white-50 small fw-semibold">Varian Menu</div>
                        <h4 class="fw-bold mb-0 mt-1">{{ $totalMenu }} Item</h4>
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-cup-hot"></i></div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL TRANSAKSI TERBARU --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Transaksi Terbaru</h5>
            <a href="{{ route('transaksi.riwayat') }}" class="btn btn-sm btn-outline-secondary rounded-pill">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Kode Transaksi</th>
                            <th>Pelanggan / Meja</th>
                            <th>Waktu</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesananTerbaru as $pesanan)
                            <tr>
                                <td class="ps-4 fw-bold font-monospace text-primary">
                                    {{ $pesanan->kode_transaksi }}
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $pesanan->nama_pelanggan }}</div>
                                    <small class="text-muted">Meja: {{ $pesanan->nomor_meja }}</small>
                                </td>
                                <td class="small text-muted">{{ $pesanan->created_at->diffForHumans() }}</td>
                                <td class="fw-bold text-success">
                                    Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if ($pesanan->status_pesanan == 'selesai')
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
                                            <i class="bi bi-check-circle-fill me-1"></i> Selesai
                                        </span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill px-3 py-2">
                                            <i class="bi bi-hourglass-split me-1"></i> Diproses
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada transaksi terbaru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection