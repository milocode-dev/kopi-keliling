@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-lg mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold text-amber-900 mb-6">Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST"
          class="bg-white shadow-2xl rounded-xl p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-700 focus:outline-none">
            @error('nama_kategori')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('kategori.index') }}"
               class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-50">Batal</a>
            <button type="submit"
                    class="bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-900">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection