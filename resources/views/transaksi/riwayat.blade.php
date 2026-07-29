@extends('layouts.app')

@section('title', 'Riwayat Transaksi - Kopi Gerobakan')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Riwayat Transaksi</h3>
            <p class="text-muted small mb-0">Daftar semua transaksi pesanan pelanggan</p>
        </div>
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Transaksi Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Pelanggan / Meja</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $index => $pesanan)
                            <tr>
                                <td class="ps-4 fw-semibold text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace fs-6">
                                        {{ $pesanan->kode_transaksi }}
                                    </span>
                                </td>
                                <td class="small">{{ $pesanan->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $pesanan->nama_pelanggan }}</div>
                                    <small class="text-muted">Meja: {{ $pesanan->nomor_meja }}</small>
                                </td>
                                <td class="fw-bold text-success">
                                    Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    <form action="{{ route('transaksi.update-status', $pesanan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status_pesanan" onchange="this.form.submit()" 
                                                class="form-select form-select-sm fw-semibold rounded-pill border-0 {{ $pesanan->status_pesanan == 'selesai' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning-emphasis' }}" style="width: auto;">
                                            <option value="proses" {{ $pesanan->status_pesanan == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary rounded-3" data-bs-toggle="modal" data-bs-target="#detailModal{{ $pesanan->id }}">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </button>
                                </td>
                            </tr>

                            {{-- MODAL DETAIL PESANAN --}}
                            <div class="modal fade" id="detailModal{{ $pesanan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow rounded-4">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-header-title fw-bold">Rincian Transaksi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="bg-light p-3 rounded-3 mb-3">
                                                <div class="d-flex justify-content-between text-muted small mb-1">
                                                    <span>Kode: {{ $pesanan->kode_transaksi }}</span>
                                                    <span>{{ $pesanan->created_at->format('d/m/Y H:i') }}</span>
                                                </div>
                                                <div class="fw-bold text-dark">{{ $pesanan->nama_pelanggan }} (Meja: {{ $pesanan->nomor_meja }})</div>
                                            </div>

                                            <h6 class="fw-bold mb-2">Item Pesanan:</h6>
                                            <ul class="list-group list-group-flush mb-3">
                                                @foreach ($pesanan->detailPesanans as $detail)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                        <div>
                                                            <div class="fw-semibold">{{ $detail->menu->nama_menu ?? 'Menu Dihapus' }}</div>
                                                            <small class="text-muted">Rp {{ number_format($detail->harga, 0, ',', '.') }} x {{ $detail->jumlah }}</small>
                                                        </div>
                                                        <span class="fw-bold">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="border-top pt-2 d-flex justify-content-between align-items-center">
                                                <span class="fw-bold fs-6">Total Pembayaran</span>
                                                <span class="fw-bold fs-5 text-success">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-outline-primary rounded-3" onclick="window.print()">
                                                <i class="bi bi-printer me-1"></i> Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-receipt fs-1 d-block mb-2 text-secondary"></i>
                                    Belum ada transaksi yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection