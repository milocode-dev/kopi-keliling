@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <div class="p-4 p-md-5 mb-5 shadow-sm rounded-4 text-white position-relative overflow-hidden"
         style="background: linear-gradient(135deg, #7c5237 0%, #5a3822 100%);">

        <div class="row align-items-center position-relative" style="z-index: 2;">

            <div class="col-lg-7">

                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3"
                      style="background-color:#d4a373;color:#2b1a10;">

                    <i class="bi bi-star-fill me-1"></i>
                    Kopi Nikmat, Harga Bersahabat

                </span>

                <h1 class="display-5 fw-bold mb-3 text-white">
                    Nikmati Kopi Enak Setiap Saat ♡
                </h1>

                <p class="text-white-50 lead mb-4">
                    Kopi Gerobakan hadir untuk menemani hari-hari Anda
                    dengan seduhan biji kopi pilihan dan harga yang ramah
                    di kantong.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-4">

                    <a href="{{ route('menu.index') }}"
                       class="btn fw-bold px-4 py-2 rounded-pill shadow-sm text-white"
                       style="background-color:#c68b59;">

                        <i class="bi bi-cup-hot me-1"></i>
                        Lihat Menu

                    </a>

                    <a href="https://wa.me/628123456789"
                       target="_blank"
                       class="btn btn-outline-light px-4 py-2 rounded-pill">

                        <i class="bi bi-whatsapp me-1"></i>
                        Hubungi Kami

                    </a>

                </div>

                <div class="d-flex align-items-center gap-3 pt-2">

                    <div class="d-flex">

                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop"
                             class="rounded-circle border border-2 border-white"
                             style="width:38px;height:38px;object-fit:cover;margin-right:-10px;">

                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop"
                             class="rounded-circle border border-2 border-white"
                             style="width:38px;height:38px;object-fit:cover;margin-right:-10px;">

                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&h=100&fit=crop"
                             class="rounded-circle border border-2 border-white"
                             style="width:38px;height:38px;object-fit:cover;margin-right:-10px;">

                        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=100&h=100&fit=crop"
                             class="rounded-circle border border-2 border-white"
                             style="width:38px;height:38px;object-fit:cover;">

                    </div>

                    <small class="text-white-50 fw-semibold">
                        1.000+ pelanggan puas dengan kopi kami! ♥
                    </small>

                </div>

            </div>

            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <div class="p-2 rounded-4 shadow border border-light border-opacity-25"
                     style="background-color:rgba(255,255,255,.1);">

                    <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=600&q=80"
                         class="img-fluid rounded-4 w-100"
                         style="max-height:320px;object-fit:cover;"
                         alt="Gerobak Kopi">

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- KEUNGGULAN --}}
    {{-- ========================================================= --}}

    <div class="row g-4 mb-5">

        <div class="col-6 col-md-3">

            <div class="card shadow-sm rounded-4 text-center p-3 h-100">

                <div class="text-warning fs-3 mb-2">
                    <i class="bi bi-cup-straw"></i>
                </div>

                <h6 class="fw-bold" style="color:#5a3822;">
                    Biji Kopi Pilihan
                </h6>

                <p class="text-muted small mb-0">
                    Kualitas biji kopi terbaik.
                </p>

            </div>

        </div>


        <div class="col-6 col-md-3">

            <div class="card shadow-sm rounded-4 text-center p-3 h-100">

                <div class="text-warning fs-3 mb-2">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>

                <h6 class="fw-bold" style="color:#5a3822;">
                    Rasa Konsisten
                </h6>

                <p class="text-muted small mb-0">
                    Racikan pas setiap hari.
                </p>

            </div>

        </div>


        <div class="col-6 col-md-3">

            <div class="card shadow-sm rounded-4 text-center p-3 h-100">

                <div class="text-warning fs-3 mb-2">
                    <i class="bi bi-tag-fill"></i>
                </div>

                <h6 class="fw-bold" style="color:#5a3822;">
                    Harga Hemat
                </h6>

                <p class="text-muted small mb-0">
                    Ramah di kantong pelajar.
                </p>

            </div>

        </div>


        <div class="col-6 col-md-3">

            <div class="card shadow-sm rounded-4 text-center p-3 h-100">

                <div class="text-warning fs-3 mb-2">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h6 class="fw-bold" style="color:#5a3822;">
                    Baristanya Ramah
                </h6>

                <p class="text-muted small mb-0">
                    Pelayanan cepat & hangat.
                </p>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- TESTIMONI --}}
    {{-- ========================================================= --}}

    <div class="mb-5">

        <div class="text-center mb-4">

            <h2 class="fw-bold" style="color:#5a3822;">
                Apa Kata Mereka?
            </h2>

            <p class="text-muted">
                Testimoni asli dari para pelanggan setia Kopi Gerobakan.
            </p>

        </div>


        <div class="row g-3 align-items-stretch">


            {{-- TESTIMONI 1 --}}

            <div class="col-md-3">

                <div class="card shadow-sm rounded-4 p-4 h-100">

                    <div>

                        <div class="text-warning mb-2">
                            ★★★★★
                        </div>

                        <p class="text-muted fst-italic"
                           style="font-size:.85rem;">

                            "Kopi susunya beneran enak banget!
                            Rasanya gak kalah sama kopi-kopi mahal di kafe,
                            tapi harganya ramah banget di kantong mahasiswa."

                        </p>

                    </div>

                    <hr>

                    <div class="d-flex align-items-center gap-2">

                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop"
                             class="rounded-circle"
                             width="40"
                             height="40"
                             style="object-fit:cover;">

                        <div>

                            <b style="color:#5a3822;">
                                Siti Aminah
                            </b>

                            <small class="d-block text-muted">
                                Pelanggan Setia
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- TESTIMONI 2 --}}

            <div class="col-md-3">

                <div class="card shadow-sm rounded-4 p-4 h-100">

                    <div>

                        <div class="text-warning mb-2">
                            ★★★★★
                        </div>

                        <p class="text-muted fst-italic"
                           style="font-size:.85rem;">

                            "Tempat nongkrong gerobakan paling recommended.
                            Baristanya ramah, pelayanannya cepat,
                            dan es kopi arennya juara banget!"

                        </p>

                    </div>

                    <hr>

                    <div class="d-flex align-items-center gap-2">

                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop"
                             class="rounded-circle"
                             width="40"
                             height="40"
                             style="object-fit:cover;">

                        <div>

                            <b style="color:#5a3822;">
                                Rizky Pratama
                            </b>

                            <small class="d-block text-muted">
                                Pekerja Kantoran
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- TESTIMONI 3 --}}

            <div class="col-md-3">

                <div class="card shadow-sm rounded-4 p-4 h-100">

                    <div>

                        <div class="text-warning mb-2">
                            ★★★★☆
                        </div>

                        <p class="text-muted fst-italic"
                           style="font-size:.85rem;">

                            "Suka banget sama varian menunya yang beragam.
                            Kualitas biji kopinya kerasa banget wangi
                            dan segarnya."

                        </p>

                    </div>

                    <hr>

                    <div class="d-flex align-items-center gap-2">

                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=100&h=100&fit=crop"
                             class="rounded-circle"
                             width="40"
                             height="40"
                             style="object-fit:cover;">

                        <div>

                            <b style="color:#5a3822;">
                                Dewi Lestari
                            </b>

                            <small class="d-block text-muted">
                                Penikmat Kopi
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- KOMENTAR BARU --}}
            {{-- ================================================= --}}

            @if(session('testimoni_baru'))

                <div class="col-md-3">

                    <div class="card shadow-sm rounded-4 p-4 h-100 border bg-white">

                        <div class="text-warning mb-2">

                            @for($i = 1; $i <= session('testimoni_baru.rating'); $i++)

                                <i class="bi bi-star-fill"></i>

                            @endfor

                        </div>

                        <p class="text-muted fst-italic"
                           style="font-size:.85rem;">

                            "{{ session('testimoni_baru.komentar') }}"

                        </p>

                        <hr>

                        <div class="d-flex align-items-center gap-2">

                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                 style="
                                    width:40px;
                                    height:40px;
                                    background:#7c5237;
                                 ">

                                {{ strtoupper(substr(session('testimoni_baru.nama'), 0, 1)) }}

                            </div>

                            <div>

                                <b style="color:#5a3822;">

                                    {{ session('testimoni_baru.nama') }}

                                </b>

                                <small class="d-block text-muted">

                                    {{ session('testimoni_baru.pekerjaan') }}

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- TOMBOL TAMBAH KOMENTAR --}}
            {{-- SELALU MUNCUL --}}
            {{-- ================================================= --}}

            <div class="col-md-3">

                <button type="button"
                        class="btn h-100 w-100 border-2 rounded-4 p-4 shadow-sm
                               d-flex flex-column align-items-center
                               justify-content-center"
                        style="
                            border-style:dashed !important;
                            border-color:#c68b59 !important;
                            background:#fdfaf7;
                            color:#5a3822;
                        "
                        data-bs-toggle="modal"
                        data-bs-target="#modalKomentar">

                    <div class="rounded-circle d-flex
                                align-items-center justify-content-center
                                mb-2 text-white"
                         style="
                            width:50px;
                            height:50px;
                            background:#7c5237;
                         ">

                        <i class="bi bi-plus-lg fs-4"></i>

                    </div>

                    <span class="fw-bold">
                        Tambah Komentar
                    </span>

                    <small class="text-muted">
                        Bagikan pengalamanmu
                    </small>

                </button>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- MODAL KOMENTAR --}}
{{-- ========================================================= --}}

<div class="modal fade"
     id="modalKomentar"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header">

                <h5 class="modal-title fw-bold"
                    style="color:#5a3822;">

                    <i class="bi bi-chat-heart me-1"></i>
                    Tulis Komentar Anda

                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <form action="{{ route('testimoni.store') }}"
                  method="POST">

                @csrf

                <div class="modal-body">

                    {{-- NAMA --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="color:#5a3822;">

                            Nama Lengkap

                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control rounded-3"
                               placeholder="Masukkan nama Anda"
                               required>

                    </div>


                    {{-- PEKERJAAN --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="color:#5a3822;">

                            Pekerjaan / Status

                        </label>

                        <input type="text"
                               name="pekerjaan"
                               class="form-control rounded-3"
                               placeholder="Contoh: Pelajar, Mahasiswa">

                    </div>


                    {{-- RATING --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="color:#5a3822;">

                            Rating Kopi

                        </label>

                        <select name="rating"
                                class="form-select rounded-3"
                                required>

                            <option value="5">
                                ⭐⭐⭐⭐⭐ (5/5) - Sangat Puas
                            </option>

                            <option value="4">
                                ⭐⭐⭐⭐ (4/5) - Puas
                            </option>

                            <option value="3">
                                ⭐⭐⭐ (3/5) - Cukup
                            </option>

                            <option value="2">
                                ⭐⭐ (2/5) - Kurang
                            </option>

                            <option value="1">
                                ⭐ (1/5) - Tidak Puas
                            </option>

                        </select>

                    </div>


                    {{-- KOMENTAR --}}

                    <div class="mb-3">

                        <label class="form-label fw-semibold"
                               style="color:#5a3822;">

                            Komentar

                        </label>

                        <textarea name="komentar"
                                  class="form-control rounded-3"
                                  rows="4"
                                  placeholder="Tulis pengalaman Anda..."
                                  required></textarea>

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn text-white rounded-pill px-4 fw-bold"
                            style="background:#6b4423;">

                        <i class="bi bi-send-fill me-1"></i>

                        Kirim Komentar

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- PESAN VALIDASI --}}
{{-- ========================================================= --}}

@if($errors->any())

    <div class="alert alert-danger position-fixed"
         style="
            bottom:20px;
            right:20px;
            z-index:9999;
         ">

        {{ $errors->first() }}

    </div>

@endif


@endsection