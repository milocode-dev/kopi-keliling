@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        {{-- KOLOM KIRI: Daftar Menu --}}
        <div class="col-lg-7 col-xl-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 border-0">
                    <div class="row align-items-center g-2">
                        <div class="col-md-5">
                            <h4 class="mb-0 fw-bold">Daftar Menu</h4>
                            <small class="text-muted">Pilih menu untuk menambahkan ke keranjang</small>
                        </div>
                        <div class="col-md-7">
                            {{-- Input Cari Menu --}}
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-search text-muted"></i></span>
                                <input type="text" id="searchMenu" class="form-control bg-light border-0" placeholder="Cari menu minuman/makanan...">
                            </div>
                        </div>
                    </div>

                    {{-- Filter Kategori --}}
                    <div class="d-flex gap-2 overflow-auto mt-3 pt-2 pb-1" id="categoryFilter" style="white-space: nowrap;">
                        <button class="btn btn-sm btn-primary rounded-pill px-3 filter-btn active" data-kategori="all">Semua Menu</button>
                        @foreach ($kategoris as $kategori)
                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 filter-btn" data-kategori="{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="card-body bg-light-subtle">
                    <div class="row g-3" id="menuContainer">
                        @forelse ($menus as $menu)
                            <div class="col-6 col-sm-4 col-md-4 col-xl-3 menu-item" 
                                 data-id="{{ $menu->id }}"
                                 data-nama="{{ $menu->nama_menu }}"
                                 data-harga="{{ $menu->harga }}"
                                 data-kategori="{{ $menu->kategori_id }}">
                                
                                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden d-flex flex-column justify-content-between">
                                    <div>
                                        @if ($menu->gambar)
                                            <img src="{{ \Illuminate\Support\Str::startsWith($menu->gambar, 'http') ? $menu->gambar : asset('storage/' . $menu->gambar) }}" 
                                                 class="card-img-top" 
                                                 style="height: 150px; width: 100%; object-fit: cover;" 
                                                 alt="{{ $menu->nama_menu }}"
                                                 onerror="this.onerror=null; this.src='https://placehold.co/300x200?text=Gambar+Error';">
                                        @else
                                            <div class="bg-secondary-subtle d-flex align-items-center justify-content-center text-secondary" style="height: 150px;">
                                                <i class="bi bi-cup-hot fs-1"></i>
                                            </div>
                                        @endif

                                        <div class="p-3 text-center">
                                            <h6 class="card-title text-truncate mb-1 fw-bold text-dark">{{ $menu->nama_menu }}</h6>
                                            <p class="card-text text-primary fw-bold mb-0">
                                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="p-3 pt-0">
                                        <button class="btn btn-sm btn-outline-primary w-100 fw-semibold rounded-2 btn-add-cart">
                                            <i class="bi bi-plus-lg me-1"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada menu tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Struk & Keranjang Belanja (Diperbaiki dengan posisi sticky yang rapi) --}}
        <div class="col-lg-5 col-xl-4">
            <div style="position: sticky; top: 90px;">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="mb-0 fw-bold d-flex align-items-center">
                            <i class="bi bi-cart3 text-primary me-2"></i> Pesanan Aktif
                        </h5>
                    </div>

                    <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
                        @csrf
                        <div class="card-body pt-0">
                            {{-- Input Info Pelanggan & Meja --}}
                            <div class="row g-2 mb-3 bg-light p-3 rounded-3">
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">Pelanggan</label>
                                    <input type="text" name="nama_pelanggan" class="form-control form-control-sm border-0" placeholder="Nama Pelanggan">
                                </div>
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">Nomor Meja</label>
                                    <input type="text" name="nomor_meja" class="form-control form-control-sm border-0" placeholder="Meja 01">
                                </div>
                            </div>

                            {{-- Item Keranjang --}}
                            <div id="cartList" class="mb-3 overflow-auto pe-1" style="max-height: 320px; min-height: 180px;">
                                <div class="text-center text-muted py-5" id="emptyCartText">
                                    <i class="bi bi-basket fs-2 d-block mb-2 text-secondary-subtle"></i>
                                    Keranjang masih kosong
                                </div>
                            </div>

                            <div class="border-top pt-3">
                                {{-- Ringkasan Total --}}
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold text-muted">Total Pembayaran:</span>
                                    <span class="fw-bold fs-4 text-success" id="totalText">Rp 0</span>
                                </div>

                                <button type="submit" class="btn btn-success w-100 fw-bold py-2 rounded-3" id="btnSubmit" disabled>
                                    <i class="bi bi-check-circle me-1"></i> Proses Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT KERANJANG & FILTER --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    let cart = [];

    const menuContainer = document.getElementById('menuContainer');
    const cartList = document.getElementById('cartList');
    const emptyCartText = document.getElementById('emptyCartText');
    const totalText = document.getElementById('totalText');
    const btnSubmit = document.getElementById('btnSubmit');
    const searchInput = document.getElementById('searchMenu');
    const categoryButtons = document.querySelectorAll('.filter-btn');

    // 1. Tambah item ke keranjang
    menuContainer.addEventListener('click', function (e) {
        const btn = e.target.closest('.btn-add-cart');
        if (btn) {
            const card = btn.closest('.menu-item');
            const id = card.dataset.id;
            const nama = card.dataset.nama;
            const harga = parseInt(card.dataset.harga);

            const existingIndex = cart.findIndex(item => item.id === id);

            if (existingIndex > -1) {
                cart[existingIndex].jumlah += 1;
            } else {
                cart.push({ id: id, nama: nama, harga: harga, jumlah: 1 });
            }

            renderCart();
        }
    });

    // 2. Render item di keranjang & kalkulasi total
    function renderCart() {
        cartList.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            cartList.appendChild(emptyCartText);
            btnSubmit.disabled = true;
            totalText.textContent = 'Rp 0';
            return;
        }

        btnSubmit.disabled = false;

        cart.forEach((item, index) => {
            const subtotal = item.harga * item.jumlah;
            total += subtotal;

            const cartItem = document.createElement('div');
            cartItem.className = 'd-flex align-items-center justify-content-between p-2 mb-2 bg-light rounded-3';
            cartItem.innerHTML = `
                <div style="flex: 1;" class="me-2">
                    <div class="fw-semibold text-dark small text-truncate" style="max-width: 130px;">${item.nama}</div>
                    <div class="text-muted small">Rp ${item.harga.toLocaleString('id-ID')}</div>
                    
                    <input type="hidden" name="items[${index}][id]" value="${item.id}">
                    <input type="hidden" name="items[${index}][jumlah]" value="${item.jumlah}">
                </div>
                
                <div class="d-flex align-items-center gap-1">
                    <button type="button" class="btn btn-sm btn-white border py-0 px-2 btn-minus fw-bold" data-id="${item.id}">-</button>
                    <span class="small fw-bold px-1">${item.jumlah}</span>
                    <button type="button" class="btn btn-sm btn-white border py-0 px-2 btn-plus fw-bold" data-id="${item.id}">+</button>
                    <button type="button" class="btn btn-sm btn-outline-danger border-0 py-0 px-2 ms-1 btn-delete" data-id="${item.id}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;

            cartList.appendChild(cartItem);
        });

        totalText.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    // 3. Update Qty & Hapus Item (+, -, x)
    cartList.addEventListener('click', function (e) {
        const btn = e.target.closest('button');
        if (!btn) return;
        
        const id = btn.dataset.id;
        if (!id) return;

        const itemIndex = cart.findIndex(item => item.id === id);

        if (btn.classList.contains('btn-plus')) {
            cart[itemIndex].jumlah += 1;
        } else if (btn.classList.contains('btn-minus')) {
            if (cart[itemIndex].jumlah > 1) {
                cart[itemIndex].jumlah -= 1;
            } else {
                cart.splice(itemIndex, 1);
            }
        } else if (btn.classList.contains('btn-delete')) {
            cart.splice(itemIndex, 1);
        }

        renderCart();
    });

    // 4. Fitur Cari Menu (Realtime)
    searchInput.addEventListener('input', filterMenu);

    // 5. Fitur Filter Kategori
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            categoryButtons.forEach(b => {
                b.classList.remove('active', 'btn-primary');
                b.classList.add('btn-outline-secondary');
            });

            this.classList.remove('btn-outline-secondary');
            this.classList.add('active', 'btn-primary');

            filterMenu();
        });
    });

    function filterMenu() {
        const searchText = searchInput.value.toLowerCase();
        const activeCategory = document.querySelector('.filter-btn.active').dataset.kategori;
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            const nama = item.dataset.nama.toLowerCase();
            const kategori = item.dataset.kategori;

            const matchSearch = nama.includes(searchText);
            const matchCategory = activeCategory === 'all' || kategori === activeCategory;

            if (matchSearch && matchCategory) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
});
</script>
@endsection