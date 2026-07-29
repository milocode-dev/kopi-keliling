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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">☕ Kopi Gerobakan</a>
    <div class="navbar-nav ms-auto gap-2">
      <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
      <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
      <a class="nav-link" href="{{ route('menu.index') }}">Menu</a>
      <a class="nav-link" href="{{ route('transaksi.index') }}">POS Kasir</a>
      <a class="nav-link" href="{{ route('transaksi.riwayat') }}">Riwayat</a>
    </div>
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