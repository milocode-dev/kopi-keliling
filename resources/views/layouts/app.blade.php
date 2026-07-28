<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopi Gerobakan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-yellow-800 text-white px-6 py-4">
        <p>Navbar</p>
    </nav>

    {{-- Konten tiap halaman akan muncul di sini --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-700 text-white text-center py-4">
        <p>&copy; 2026 Kopi Gerobakan</p>
    </footer>

</body>
</html>