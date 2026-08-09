@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md my-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Menu</h1>
        <a href="{{ route('menu.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
            + Tambah Menu
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm border-b">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Gambar</th>
                    <th class="py-3 px-4">Nama Menu</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Harga</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($menus as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_menu }}" class="w-16 h-16 object-cover rounded-md">
                            @else
                                <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 font-semibold text-gray-800">{{ $item->nama_menu }}</td>
                        <td class="py-3 px-4">
                            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">
                                {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-medium text-green-600">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('menu.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1.5 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1.5 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 text-center text-gray-500">
                            Belum ada data menu. <a href="{{ route('menu.create') }}" class="text-blue-500 underline">Tambah sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection