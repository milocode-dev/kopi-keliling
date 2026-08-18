@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container py-4" style="max-width: 500px;">
    <h2 class="fw-bold mb-4" style="color: #5a3822;">Tambah Kategori</h2>

    <form action="{{ route('kategori.store') }}" method="POST"
          class="card shadow-sm rounded-4 p-4 border">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                   class="form-control rounded-3">
            @error('nama_kategori')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 pt-2">
            <a href="{{ route('kategori.index') }}" class="btn btn-light border rounded-pill px-4">Batal</a>
            <button type="submit" class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #6b4423;">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection