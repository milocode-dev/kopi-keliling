@extends('layouts.app')

@section('title', 'Data Kategori')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-amber-900">Data Kategori</h1>
        <a href="{{ route('kategori.create') }}"
           class="bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-900">
            + Tambah Kategori
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-amber-100 text-amber-900">
                <tr>
                    <th class="px-6 py-3">Nama Kategori</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kategori)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $kategori->nama_kategori }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                           class="text-amber-700 hover:underline">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada data kategori</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection