@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="max-w-lg mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold text-amber-900 mb-6">Tambah Menu</h1>

    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow-2xl rounded-xl p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori_id"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ old('nama_menu') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
            @error('nama_menu')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
            <input type="number" name="harga" value="{{ old('harga') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
            @error('harga')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
            <input type="file" name="gambar" accept="image/*"
                   class="w-full border rounded-lg px-4 py-2">
            @error('gambar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('menu.index') }}"
               class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit"
                    class="bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-900">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection