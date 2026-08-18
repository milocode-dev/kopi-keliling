@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="container py-4" style="max-width: 600px;">
    <h2 class="fw-bold mb-4" style="color: #5a3822;">Tambah Menu </h2>

    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data"
          class="card shadow-sm rounded-4 p-4 border">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="kategori_id" class="form-select rounded-3">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Contoh: Kopi Susu Gula Aren"
                   class="form-control rounded-3">
            @error('nama_menu')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi Menu</label>
            <textarea name="deskripsi" rows="3" placeholder="Contoh: Kopi dengan gula aren asli"
                      class="form-control rounded-3">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Harga (Rp)</label>
            <input type="number" name="harga" value="{{ old('harga') }}" placeholder="18000"
                   class="form-control rounded-3">
            @error('harga')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Menu</label>
            <input type="file" name="gambar" accept="image/*" id="gambarInput" class="form-control rounded-3">

            <div id="imagePreviewContainer" class="mt-3 d-none">
                <p class="text-muted small mb-1">Pratinjau Gambar:</p>
                <img id="imagePreview" src="#" alt="Preview" class="rounded-3 border" style="width: 120px; height: 120px; object-fit: cover;">
            </div>

            @error('gambar')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 pt-2">
            <a href="{{ route('menu.index') }}" class="btn btn-light border rounded-pill px-4">Batal</a>
            <button type="submit" class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #6b4423;">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('d-none');
        }
    });
</script>
@endsection