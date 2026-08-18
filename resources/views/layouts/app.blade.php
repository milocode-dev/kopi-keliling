<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kopi Gerobakan') }}</title>

    <!-- FAVICON ICON (AI Sparkles & Cyber Glow) -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none'><path d='M12 0C12 6.627 17.373 12 24 12C17.373 12 12 17.373 12 24C12 17.373 6.627 12 0 12C6.627 12 12 6.627 12 0Z' fill='url(%23ai-glow)'/><path d='M18 3c0 2.2-1.8 4-4 4 2.2 0 4 1.8 4 4 0-2.2 1.8-4 4-4-2.2 0-4-1.8-4-4z' fill='%2338BDF8'/><defs><linearGradient id='ai-glow' x1='0' y1='0' x2='24' y2='24' gradientUnits='userSpaceOnUse'><stop stop-color='%236366F1'/><stop offset='0.5' stop-color='%23A855F7'/><stop offset='1' stop-color='%23EC4899'/></linearGradient></defs></svg>">

    <!-- Fonts & Icons -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body class="bg-light">
    <div id="app">
        <!-- NAVBAR COKELAT RAPI & RAMPING -->
        <nav class="navbar navbar-expand-md navbar-dark sticky-top shadow-sm py-2" style="background-color: #6b4423;">
            <div class="container">
                <!-- Logo dengan ikon cangkir kopi Bootstrap -->
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2 text-white fs-5" href="{{ route('home') }}">
                    <i class="bi bi-cup-hot-fill text-warning"></i> Kopi Gerobakan
                </a>

                <!-- Tombol Toggler untuk HP/Mobile -->
                <button class="navbar-toggler border-0 text-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Menu navigasi -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-md-center gap-lg-2">

                        <li class="nav-item">
                            <a class="nav-link text-white-50 {{ request()->routeIs('home') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                {{-- Menu khusus Admin --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white-50 {{ request()->routeIs('dashboard') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white-50 {{ request()->routeIs('kategori.*') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('kategori.index') }}">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white-50 {{ request()->routeIs('menu.*') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('menu.index') }}">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white-50 {{ request()->routeIs('transaksi.index') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('transaksi.index') }}">POS Kasir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white-50 {{ request()->routeIs('transaksi.riwayat') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('transaksi.riwayat') }}">Riwayat</a>
                                </li>
                            @else
                                {{-- Menu khusus Customer yang sudah login --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white-50" href="#">Pesanan Saya</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="#">Halo, {{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                                </form>
                            </li>
                        @else
                            {{-- Menu untuk yang belum login (guest) --}}
                            <li class="nav-item">
                                <a class="nav-link text-white-50 {{ request()->routeIs('tentang-kami') ? 'active text-white fw-bold border-bottom border-2 border-white' : '' }}" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="{{ route('auth.login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-warning btn-sm text-dark fw-semibold ms-lg-2" href="{{ route('auth.register') }}">Daftar</a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <!-- KONTEN UTAMA -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>