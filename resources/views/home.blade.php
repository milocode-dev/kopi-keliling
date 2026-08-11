@extends('layouts.app')

@section('content')
<div class="container py-4">
    {{-- HERO BANNER SECTION --}}
    <div class="p-4 p-md-5 mb-5 shadow-sm rounded-4 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #7c5237 0%, #5a3822 100%);">
        <div class="row align-items-center position-relative" style="z-index: 2;">
            <div class="col-lg-7">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3" style="background-color: #d4a373; color: #2b1a10;">
                    <i class="bi bi-star-fill me-1"></i> Kopi Nikmat, Harga Bersahabat
                </span>
                <h1 class="display-5 fw-bold mb-3 text-white">Nikmati Kopi Enak Setiap Saat ♡</h1>
                <p class="text-white-50 lead mb-4">
                    Kopi Gerobakan hadir untuk menemani hari-hari Anda dengan seduhan biji kopi pilihan dan harga yang ramah di kantong.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ route('menu.index') }}" class="btn fw-bold px-4 py-2 rounded-pill shadow-sm text-white" style="background-color: #c68b59;">
                        <i class="bi bi-cup-hot me-1"></i> Lihat Menu
                    </a>
                    <a href="https://wa.me/628123456789" target="_blank" class="btn btn-outline-light px-4 py-2 rounded-pill">
                        <i class="bi bi-whatsapp me-1"></i> Hubungi Kami
                    </a>
                </div>

                {{-- Customer Avatar & Testimoni --}}
                <div class="d-flex align-items-center gap-3 pt-2">
                    <div class="d-flex">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop" class="rounded-circle border border-2 border-white" style="width: 38px; height: 38px; object-fit: cover; margin-right: -10px;" alt="User">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" class="rounded-circle border border-2 border-white" style="width: 38px; height: 38px; object-fit: cover; margin-right: -10px;" alt="User">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&h=100&fit=crop" class="rounded-circle border border-2 border-white" style="width: 38px; height: 38px; object-fit: cover; margin-right: -10px;" alt="User">
                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop" class="rounded-circle border border-2 border-white" style="width: 38px; height: 38px; object-fit: cover;" alt="User">
                    </div>
                    <small class="text-white-50 fw-semibold" style="font-size: 0.85rem;">
                        1.000+ pelanggan puas dengan kopi kami! ♥
                    </small>
                </div>
            </div>

            {{-- FOTO / ILUSTRASI KANAN --}}
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <div class="p-2 rounded-4 shadow border border-light border-opacity-25" style="background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(5px);">
                    <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80" 
                         class="img-fluid rounded-4 w-100" style="max-height: 320px; object-fit: cover;" alt="Gerobak Kopi">
                </div>
            </div>
        </div>
    </div>

    {{-- KEUNGGULAN / FEATURE SECTION --}}
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3 h-100 border bg-white">
                <div class="mb-2 text-warning fs-3"><i class="bi bi-cup-straw"></i></div>
                <h6 class="fw-bold mb-1" style="color: #5a3822;">Biji Kopi Pilihan</h6>
                <p class="text-muted small mb-0">Kualitas biji kopi terbaik.</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3 h-100 border bg-white">
                <div class="mb-2 text-warning fs-3"><i class="bi bi-cup-hot-fill"></i></div>
                <h6 class="fw-bold mb-1" style="color: #5a3822;">Rasa Konsisten</h6>
                <p class="text-muted small mb-0">Racikan pas setiap hari.</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3 h-100 border bg-white">
                <div class="mb-2 text-warning fs-3"><i class="bi bi-tag-fill"></i></div>
                <h6 class="fw-bold mb-1" style="color: #5a3822;">Harga Hemat</h6>
                <p class="text-muted small mb-0">Ramah di kantong pelajar.</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm rounded-4 text-center p-3 h-100 border bg-white">
                <div class="mb-2 text-warning fs-3"><i class="bi bi-people-fill"></i></div>
                <h6 class="fw-bold mb-1" style="color: #5a3822;">Baristanya Ramah</h6>
                <p class="text-muted small mb-0">Pelayanan cepat & hangat.</p>
            </div>
        </div>
    </div>

    {{-- BAGIAN TESTIMONI PELANGGAN --}}
    <div class="mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: #5a3822;">Apa Kata Mereka? ☕</h2>
            <p class="text-muted">Testimoni asli dari para pelanggan setia Kopi Gerobakan.</p>
        </div>

        <div class="row g-4">
            {{-- Testimoni 1 --}}
            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 p-4 h-100 border bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-3 text-muted fst-italic">
                            "Kopi susunya beneran enak banget! Rasanya gak kalah sama kopi-kopi mahal di kafe, tapi harganya ramah banget di kantong mahasiswa."
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop" class="rounded-circle" width="45" height="45" style="object-fit: cover;" alt="Siti Aminah">
                        <div>
                            <h6 class="fw-bold mb-0" style="color: #5a3822;">Siti Aminah</h6>
                            <small class="text-muted">Pelanggan Setia</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimoni 2 --}}
            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 p-4 h-100 border bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="mb-3 text-muted fst-italic">
                            "Tempat nongkrong gerobakan paling recommended. Baristanya ramah, pelayanannya cepat, dan es kopi arennya juara banget buat booster kerja!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" class="rounded-circle" width="45" height="45" style="object-fit: cover;" alt="Rizky Pratama">
                        <div>
                            <h6 class="fw-bold mb-0" style="color: #5a3822;">Rizky Pratama</h6>
                            <small class="text-muted">Pekerja Kantoran</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimoni 3 --}}
            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 p-4 h-100 border bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p class="mb-3 text-muted fst-italic">
                            "Suka banget sama varian menunya yang beragam. Kualitas biji kopinya kerasa banget wangi dan segarnya. Sukses terus Kopi Gerobakan!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center gap-3 pt-3 border-top">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&h=100&fit=crop" class="rounded-circle" width="45" height="45" style="object-fit: cover;" alt="Dewi Lestari">
                        <div>
                            <h6 class="fw-bold mb-0" style="color: #5a3822;">Dewi Lestari</h6>
                            <small class="text-muted">Penikmat Kopi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection