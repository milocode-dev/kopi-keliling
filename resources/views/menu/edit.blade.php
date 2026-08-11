@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Header & Tombol Kembali -->
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('menu.index') }}" class="btn btn-light border rounded-pill px-3 shadow-sm text-secondary me-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <h2 class="fw-bold mb-0" style="color: #5a3822;">
                    Edit Menu ☕
                </h2>
            </div>

            <!-- Card Form Edit -->
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Kategori</label>
                        <select name="kategori_id" class="form-select rounded-pill px-3 py-2 shadow-sm @error('kategori_id') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->id }}" {{ old('kategori_id', $menu->kategori_id) == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Menu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Nama Menu</label>
                        <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" 
                               class="form-control rounded-pill px-3 py-2 shadow-sm @error('nama_menu') is-invalid @enderror" required>
                        @error('nama_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi Menu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Deskripsi Menu</label>
                        <textarea name="deskripsi" rows="3" 
                                  class="form-control rounded-4 px-3 py-2 shadow-sm @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $menu->harga) }}" 
                               class="form-control rounded-pill px-3 py-2 shadow-sm @error('harga') is-invalid @enderror" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary d-block">Gambar Saat Ini</label>
                        @if($menu->gambar)
                            <img src="{{ Str::startsWith($menu->gambar, 'http') ? $menu->gambar : asset('storage/' . $menu->gambar) }}" 
                                 alt="{{ $menu->nama_menu }}" 
                                 class="rounded-3 border object-fit-cover shadow-sm mb-2" style="width: 100px; height: 100px;">
                        @else
                            <p class="text-muted small">Tidak ada gambar.</p>
                        @endif
                    </div>

                    <!-- Upload Gambar Baru -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Ganti Gambar Baru (Opsional)</label>
                        <input type="file" name="gambar" class="form-control rounded-pill px-3 py-2 shadow-sm @error('gambar') is-invalid @enderror">
                        <small class="text-muted mt-1 d-block">Kosongkan jika tidak ingin mengubah gambar.</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-bold py-2 rounded-pill shadow-sm" style="background-color: #6b4423;">
                            Perbarui Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection