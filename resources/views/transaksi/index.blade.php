@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        {{-- KOLOM KIRI: Daftar Menu --}}
        <div class="col-lg-7 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="mb-0 fw-bold">Daftar Menu</h5>
                        </div>
                        <div class="col-md-6 mt-2 mt-md-0">
                            {{-- Input Cari Menu --}}
                            <input type="text" id="searchMenu" class="form-control" placeholder="Cari nama menu...">
                        </div>
                    </div>

                    {{-- Filter Kategori --}}
                    <div class="d-flex gap-2 overflow-auto mt-3 pb-2" id="categoryFilter">
                        <button class="btn btn-sm btn-primary filter-btn active" data-kategori="all">Semua</button>
                        @foreach ($kategoris as $kategori)
                            <button class="btn btn-sm btn-outline-primary filter-btn" data-kategori="{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="card-body">
                    <div class="row g-3" id="menuContainer">
                        @forelse ($menus as $menu)
                            <div class="col-6 col-sm-4 col-md-4 menu-item" 
                                 data-id="{{ $menu->id }}"
                                 data-nama="{{ $menu->nama_menu }}"
                                 data-harga="{{ $menu->harga }}"
                                 data-kategori="{{ $menu->kategori_id }}">
                                
                                <div class="card h-100 border text-center p-2 shadow-sm flex-column justify-content-between">
                                    @if ($menu->gambar)
                                        <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top rounded mb-2" style="height: 110px; object-fit: cover;" alt="{{ $menu->nama_menu }}">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center mb-2" style="height: 110px;">
                                            <span class="text-muted small">Tanpa Gambar</span>
                                        </div>
                                    @endif

                                    <div>
                                        <h6 class="card-title text-truncate mb-1 fw-semibold">{{ $menu->nama_menu }}</h6>
                                        <p class="card-text text-primary fw-bold small mb-2">
                                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <button class="btn btn-sm btn-outline-primary w-100 btn-add-cart">
                                        + Tambah
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-4 text-muted">
                                Belum ada menu tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Struk & Keranjang Belanja --}}
        <div class="col-lg-5 col-md-6">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Pesanan Aktif</h5>
                </div>

                <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
                    @csrf
                    <div class="card-body">
                        {{-- Input Info Pelanggan & Meja --}}
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control form-control-sm" placeholder="Contoh: Budi">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Nomor Meja</label>
                                <input type="text" name="nomor_meja" class="form-control form-control-sm" placeholder="Contoh: Meja 04">
                            </div>
                        </div>

                        <hr>

                        {{-- Item Keranjang --}}
                        <div id="cartList" class="mb-3 overflow-auto" style="max-height: 280px;">
                            <div class="text-center text-muted py-4" id="emptyCartText">
                                Keranjang masih kosong
                            </div>
                        </div>

                        <hr>

                        {{-- Ringkasan Total --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="fw-bold">Total Pembayaran:</span>
                            <span class="fw-bold fs-5 text-success" id="totalText">Rp 0</span>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold py-2" id="btnSubmit" disabled>
                            Proses Transaksi
                        </button>
                    </div>
                </form>
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
        if (e.target.classList.contains('btn-add-cart')) {
            const card = e.target.closest('.menu-item');
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
            cartItem.className = 'd-flex align-items-center justify-content-between mb-2 pb-2 border-bottom';
            cartItem.innerHTML = `
                <div style="flex: 1;">
                    <div class="fw-semibold small">${item.nama}</div>
                    <div class="text-muted small">Rp ${item.harga.toLocaleString('id-ID')} x ${item.jumlah}</div>
                    
                    {{-- Hidden inputs untuk dikirim ke Laravel via Form --}}
                    <input type="hidden" name="items[${index}][id]" value="${item.id}">
                    <input type="hidden" name="items[${index}][jumlah]" value="${item.jumlah}">
                </div>
                
                <div class="d-flex align-items-center gap-1">
                    <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2 btn-minus" data-id="${item.id}">-</button>
                    <span class="small px-1">${item.jumlah}</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2 btn-plus" data-id="${item.id}">+</button>
                    <button type="button" class="btn btn-sm btn-outline-danger py-0 px-2 ms-1 btn-delete" data-id="${item.id}">&times;</button>
                </div>
            `;

            cartList.appendChild(cartItem);
        });

        totalText.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    // 3. Update Qty & Hapus Item (+, -, x)
    cartList.addEventListener('click', function (e) {
        const id = e.target.dataset.id;
        if (!id) return;

        const itemIndex = cart.findIndex(item => item.id === id);

        if (e.target.classList.contains('btn-plus')) {
            cart[itemIndex].jumlah += 1;
        } else if (e.target.classList.contains('btn-minus')) {
            if (cart[itemIndex].jumlah > 1) {
                cart[itemIndex].jumlah -= 1;
            } else {
                cart.splice(itemIndex, 1);
            }
        } else if (e.target.classList.contains('btn-delete')) {
            cart.splice(itemIndex, 1);
        }

        renderCart();
    });

    // 4. Fitur Cari Menu (Realtime)
    searchInput.addEventListener('input', filterMenu);

    // 5. Fitur Filter Kategori
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            categoryButtons.forEach(b => b.classList.remove('active', 'btn-primary'));
            categoryButtons.forEach(b => b.classList.add('btn-outline-primary'));

            this.classList.remove('btn-outline-primary');
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