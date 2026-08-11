@extends('layouts.app')

@section('content')
{{-- Custom Style Warm Light Coffee Theme --}}
<style>
    body {
        background-color: #f7f2ed !important;
        color: #3d2b1f;
    }

    .hero-section-coffee {
        background: linear-gradient(135deg, #7c5237 0%, #5a3822 100%);
        border-radius: 24px;
        color: #ffffff;
    }

    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-up:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(124, 82, 55, 0.15) !important;
    }

    .icon-box-coffee {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
    }

    .card-coffee {
        background-color: #ffffff;
        border: 1px solid #ebdcd0;
        color: #3d2b1f;
    }

    .badge-coffee {
        background-color: #d4a373;
        color: #2b1a10;
    }

    .btn-coffee-primary {
        background-color: #c68b59;
        color: #ffffff;
        border: none;
    }
    .btn-coffee-primary:hover {
        background-color: #a86e3d;
        color: #ffffff;
    }

    .btn-coffee-outline {
        border: 1.5px solid #ffffff;
        color: #ffffff;
        background: transparent;
    }
    .btn-coffee-outline:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .text-coffee-dark {
        color: #5a3822 !important;
    }

    .text-coffee-primary {
        color: #a86e3d !important;
    }
</style>

<div class="container py-4">
    {{-- HERO BANNER SECTION --}}
    <div class="hero-section-coffee p-4 p-md-5 mb-5 shadow-sm position-relative overflow-hidden">
        <div class="row align-items-center relative-1">
            <div class="col-lg-7">
                <span class="badge badge-coffee px-3 py-2 rounded-pill fw-bold mb-3">
                    <i class="bi bi-star-fill me-1"></i> Street Coffee Professional
                </span>
                <h1 class="display-5 fw-bold mb-3 text-white">Racikan Kopi Otentik, Nikmat Tanpa Batas.</h1>
                <p class="text-white-50 lead mb-4">
                    Kopi Gerobakan menyajikan seduhan biji kopi pilihan nusantara dengan harga yang bersahabat untuk menemani setiap cerita dan kesibukan harimu.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-coffee-primary fw-bold px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-cart-plus me-1"></i> Pesan Sekarang
                    </a>
                    <a href="{{ route('menu.index') }}" class="btn btn-coffee-outline px-4 py-2 rounded-pill">
                        Lihat Menu
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <div class="p-4 rounded-4 backdrop-blur" style="background-color: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.2);">
                    <i class="bi bi-cup-hot display-1 text-warning d-block mb-2"></i>
                    <h4 class="fw-bold text-white mb-0">100% Biji Kopi Lokal</h4>
                    <p class="small text-white-50 mb-0">Freshly Brewed Every Day</p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK SINGKAT --}}
    <div class="row g-3 mb-5">
        <div class="col-6 col-md-3">
            <div class="card card-coffee shadow-sm rounded-4 text-center p-3 hover-up">
                <h3 class="fw-bold text-coffee-primary mb-1">5.000+</h3>
                <p class="text-muted small mb-0">Cangkir Terjual</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card card-coffee shadow-sm rounded-4 text-center p-3 hover-up">
                <h3 class="fw-bold text-coffee-dark mb-1">100%</h3>
                <p class="text-muted small mb-0">Biji Kopi Nusantara</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card card-coffee shadow-sm rounded-4 text-center p-3 hover-up">
                <h3 class="fw-bold text-coffee-primary mb-1">4.9/5</h3>
                <p class="text-muted small mb-0">Rating Pelanggan</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card card-coffee shadow-sm rounded-4 text-center p-3 hover-up">
                <h3 class="fw-bold text-coffee-dark mb-1">15+</h3>
                <p class="text-muted small mb-0">Varian Rasa</p>
            </div>
        </div>
    </div>

    {{-- KEUNGGULAN / VALUE PROPOSITION --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-coffee-dark">Mengapa Pilih Kopi Gerobakan?</h3>
            <p class="text-muted">Komitmen kami untuk memberikan kualitas terbaik di setiap tegukan.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-coffee shadow-sm rounded-4 p-4 h-100 hover-up">
                    <div class="icon-box-coffee mb-3" style="background-color: #f3e9e0; color: #a86e3d;">
                        <i class="bi bi-award fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-coffee-dark">Kualitas Premium</h5>
                    <p class="text-muted small mb-0">
                        Menggunakan biji kopi sangrai segar langsung dari petani lokal terbaik Indonesia.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-coffee shadow-sm rounded-4 p-4 h-100 hover-up">
                    <div class="icon-box-coffee mb-3" style="background-color: #e8ded4; color: #7c5237;">
                        <i class="bi bi-wallet2 fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-coffee-dark">Harga Ramah Kantong</h5>
                    <p class="text-muted small mb-0">
                        Kopi nikmat dan ramah dompet. Cocok untuk kantong pelajar, mahasiswa, hingga pekerja.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-coffee shadow-sm rounded-4 p-4 h-100 hover-up">
                    <div class="icon-box-coffee mb-3" style="background-color: #f3e9e0; color: #a86e3d;">
                        <i class="bi bi-heart fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-coffee-dark">Pelayanan Ramah</h5>
                    <p class="text-muted small mb-0">
                        Barista kami siap melayani dengan senyuman dan menyajikan pesananmu dengan cepat.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- VISI & MISI --}}
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card card-coffee shadow-sm rounded-4 h-100 p-4 border-start border-4 hover-up" style="border-left-color: #c68b59 !important;">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background-color: #c68b59; color: white;">
                        <i class="bi bi-eye-fill fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0 text-coffee-dark">Visi Kami</h5>
                </div>
                <p class="text-muted lh-lg mb-0">
                    Menjadi brand kopi street-barista terdepan yang konsisten menyajikan produk berkualitas tinggi, terjangkau, dan terus mendukung keberlanjutan petani kopi lokal.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-coffee shadow-sm rounded-4 h-100 p-4 border-start border-4 hover-up" style="border-left-color: #7c5237 !important;">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background-color: #7c5237; color: white;">
                        <i class="bi bi-rocket-takeoff-fill fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0 text-coffee-dark">Misi Kami</h5>
                </div>
                <ul class="text-muted lh-lg mb-0 ps-3">
                    <li>Menggunakan biji kopi segar pilihan Indonesia.</li>
                    <li>Memberikan pelayanan cepat, bersih, dan solutif.</li>
                    <li>Menyediakan tempat dan suasana santai bagi penikmat kopi.</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- LOKASI & KONTAK CTA --}}
    <div class="card card-coffee shadow-sm rounded-4 p-4 p-md-5 text-center hover-up">
        <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2 mx-auto" style="background-color: #f3e9e0; color: #a86e3d;">
            <i class="bi bi-geo-alt-fill me-1"></i> Lokasi Kedai
        </span>
        <h4 class="fw-bold mb-2 text-coffee-dark">Singgah di Gerobak Kami</h4>
        <p class="text-muted col-md-6 mx-auto mb-4">
            Jl. Mawar No. 123, Indonesia (Depan Taman Kota). Mari mengobrol dan nikmati seduhan hangat kami!
        </p>
        
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="#" class="btn rounded-pill px-4 py-2 border" style="background-color: #f7f2ed; color: #5a3822;">
                <i class="bi bi-clock me-1 text-coffee-primary"></i> 08:00 - 22:00 WIB
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success rounded-pill px-4 py-2 fw-semibold">
                <i class="bi bi-whatsapp me-1"></i> Hubungi via WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection