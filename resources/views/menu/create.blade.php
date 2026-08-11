@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="max-w-lg mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold text-amber-900 mb-6">Tambah Menu</h1>

    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white shadow-2xl rounded-xl p-6 space-y-4">
        @csrf

        <!-- Kategori -->
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

        <!-- Nama Menu -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Contoh: Nasi Goreng Spesial"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
            @error('nama_menu')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Menu (DITAMBAHKAN) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Menu</label>
            <textarea name="deskripsi" rows="3" placeholder="Contoh: Nasi goreng dengan telur, ayam, dan kerupuk"
                      class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Harga -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
            <input type="number" name="harga" value="{{ old('harga') }}" placeholder="18000"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
            @error('harga')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Upload Gambar + Preview (DITAMBAHKAN PREVIEW) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Menu</label>
            <input type="file" name="gambar" accept="image/*" id="gambarInput"
                   class="w-full border rounded-lg px-4 py-2 text-sm text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
            
            <!-- Tempat Pratinjau Gambar -->
            <div id="imagePreviewContainer" class="mt-3 hidden">
                <p class="text-xs text-gray-500 mb-1">Pratinjau Gambar:</p>
                <img id="imagePreview" src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg border">
            </div>

            @error('gambar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-2 pt-2">
            <a href="{{ route('menu.index') }}"
               class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit"
                    class="bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-900 transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>

<!-- Script untuk Pratinjau Gambar -->
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endsection