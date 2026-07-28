@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16 text-center">
    <h1 class="text-4xl font-bold text-amber-900">Kopi Gerobakan</h1>
    <p class="mt-4 text-lg text-gray-600">Kopi enak, harga bersahabat, langsung dari gerobakan kami.</p>
    <a href="#" class="inline-block mt-6 bg-amber-800 text-white px-6 py-3 rounded-lg hover:bg-amber-900">
        Lihat Menu
    </a>
</section>

<section class="max-w-5xl mx-auto px-6 py-12">
    <h2 class="text-center mb-4 font-bold text-2xl">Our Favorite Menu</h2>

    <div class="flex justify-center gap-12">
        <div class="bg-white shadow-2xl rounded-xl p-6 w-64">
            <div class="bg-gray-300 h-40 rounded-md mb-4"></div>
            <h2 class="font-bold text-lg">Americano</h2>
            <p>Rp8.000</p>
        </div>

        <div class="bg-white shadow-2xl rounded-xl p-6 w-64">
            <div class="bg-gray-300 h-40 rounded-md mb-4"></div>
            <h2 class="font-bold text-lg">Butterscotch</h2>
            <p>Rp12.000</p>
        </div>

        <div class="bg-white shadow-2xl rounded-xl p-6 w-64">
            <div class="bg-gray-300 h-40 rounded-md mb-4"></div>
            <h2 class="font-bold text-lg">Chocolate Milky</h2>
            <p>Rp15.000</p>
        </div>
    </div>
</section>
@endsection