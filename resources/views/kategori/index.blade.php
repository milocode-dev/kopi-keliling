@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="container py-4" style="max-width: 800px;">
    <!-- Header Page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color: #5a3822;">Data Kategori</h2>
            <p class="text-muted small mb-0">Kelola kategori menu Kopi Gerobakan.</p>
        </div>
        <a href="{{ route('kategori.create') }}" 
           class="btn text-white fw-bold px-4 rounded-pill shadow-sm" style="background-color: #6b4423;">
            + Tambah Kategori
        </a>
    </div>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Data Kategori -->
    <div class="card shadow-sm rounded-4 border-0 bg-white">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3 rounded-start">Nama Kategori</th>
                            <th class="py-3 text-end rounded-end" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategoris as $kategori)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $kategori->nama_kategori }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" 
                                           class="btn btn-sm text-white px-3 rounded-pill" style="background-color: #8c5830;">
                                            Edit
                                        </a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Yakin hapus kategori ini?')" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger px-3 rounded-pill">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-4 text-muted">Belum ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection