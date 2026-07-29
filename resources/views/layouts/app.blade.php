<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kopi Gerobakan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-200 text-gray-800">

    <nav class="bg-yellow-800 text-white px-6 py-4 d-flex justify-content-between align-items-center">
    <a href="#" class="text-white fw-bold text-decoration-none fs-5">☕ Kopi Gerobakan</a>
    <div class="d-flex gap-3">
        <a href="{{ route('transaksi.index') }}" class="text-white text-decoration-none">POS Kasir</a>
        <a href="{{ route('transaksi.riwayat') }}" class="text-white text-decoration-none">Riwayat Transaksi</a>
    </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-700 text-white text-center py-4">
        <p>&copy; 2026 Kopi Gerobakan</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>