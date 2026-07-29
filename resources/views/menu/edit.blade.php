<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Menu</h1>
            <a href="{{ route('menu.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">
                &larr; Kembali
            </a>
        </div>

        {{-- Error Validation Notice --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" class="w-full border-gray-300 rounded-md p-2 border focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $menu->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Menu --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Menu</label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" class="w-full border-gray-300 rounded-md p-2 border focus:ring-2 focus:ring-blue-500" required>
            </div>

            {{-- Harga --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ old('harga', $menu->harga) }}" class="w-full border-gray-300 rounded-md p-2 border focus:ring-2 focus:ring-blue-500" required>
            </div>

            {{-- Gambar Saat Ini & Input Upload Gambar Baru --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Menu</label>
                
                @if ($menu->gambar)
                    <div class="mb-2">
                        <span class="text-xs text-gray-500 block mb-1">Gambar saat ini:</span>
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="w-24 h-24 object-cover rounded-md border">
                    </div>
                @endif

                <input type="file" name="gambar" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>

            {{-- Tombol Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 rounded-md transition">
                    Update Menu
                </button>
            </div>
        </form>

    </div>
</body>
</html>