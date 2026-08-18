@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')

<div class="container py-4"> 
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4"> 
        <div> 
            <h2 class="fw-bold mb-1" style="color: #5a3822;"> 
                Daftar Menu 
            </h2> 
            <p class="text-muted small mb-0"> 
                Kelola semua menu kopi dan minuman yang tersedia di Kopi Gerobakan. 
            </p> 
        </div> 
        <div class="mt-3 mt-md-0"> 
            <a href="{{ route('menu.create') }}" class="btn text-white fw-bold px-4 py-2 rounded-pill shadow-sm" style="background-color: #6b4423;"> 
                + Tambah Menu 
            </a> 
        </div> 
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="GET" action="{{ route('menu.index') }}" class="row g-2 mb-4">
        <div class="col-12 col-sm-4 col-md-3">
            <select name="kategori_id"
                    onchange="this.form.submit()"
                    class="form-select rounded-pill px-3 shadow-sm">
                <option value="">Semua Kategori</option>

                @if(isset($kategoris))
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}"
                            {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="col-12 col-sm-6 col-md-7">
            <div class="input-group shadow-sm">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama menu..."
                       class="form-control rounded-start-pill px-3">

                <button class="btn btn-outline-secondary rounded-end-pill px-4" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        <div class="col-12 col-sm-2 col-md-2">
            <a href="{{ route('menu.index') }}"
               class="btn btn-light border rounded-pill w-100 shadow-sm text-secondary">
                Refresh
            </a>
        </div>
    </form>

    <div class="row g-4 mb-4">
        @forelse ($menus as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm rounded-4 border p-3 bg-white d-flex flex-row gap-3 align-items-center">

                    <div class="flex-shrink-0" style="width: 90px; height: 90px;">
                        @if($item->gambar)
                            <img src="{{ Str::startsWith($item->gambar, 'http') ? $item->gambar : asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->nama_menu }}"
                                 class="w-100 h-100 rounded-3 object-fit-cover border">
                        @else
                            <div class="w-100 h-100 bg-light rounded-3 d-flex align-items-center justify-content-center text-muted small border">
                                No Image
                            </div>
                        @endif
                    </div>

                    <div class="flex-grow-1 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold text-dark mb-1 fs-6 text-truncate"
                                style="max-width: 170px;">
                                {{ $item->nama_menu }}
                            </h5>

                            <span class="badge bg-warning text-dark mb-1" style="font-size: 10px;">
                                {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                            </span>

                            <p class="text-muted small mb-2 text-truncate"
                               style="font-size: 11px; max-width: 170px;">
                                {{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </p>
                        </div>

                        <div>
                            <div class="fw-bold small mb-2" style="color: #6b4423;">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('menu.edit', $item->id) }}"
                                   class="btn btn-sm text-white rounded-3 px-3 py-1 fw-semibold text-decoration-none"
                                   style="background-color: #8c5830; font-size: 12px; line-height: 1.5;">
                                    Edit
                                </a>

                                <form action="{{ route('menu.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')"
                                      class="d-inline m-0">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger rounded-3 px-3 py-1 fw-semibold border-0"
                                            style="font-size: 12px; line-height: 1.5;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 bg-white rounded-4 border">
                <p class="text-muted fw-medium mb-2">
                    Menu tidak ditemukan.
                </p>

                <a href="{{ route('menu.create') }}"
                   class="text-decoration-underline small fw-bold"
                   style="color: #6b4423;">
                    Tambah menu baru
                </a>
            </div>
        @endforelse
    </div>

    @if(method_exists($menus, 'links') && $menus->hasPages())
        <div class="d-flex justify-content-center mt-4 pt-3 border-top">
            <div>
                {{ $menus->withQueryString()->links() }}
            </div>
        </div>
    @endif

</div>
@endsection