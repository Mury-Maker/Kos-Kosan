@extends('guest.layouts.app')

@section('title', 'Data Kos Resmi Kelurahan Sukorame')

@section('content')

<!-- search -->
<div class="p-12 mt-8 flex justify-between items-center px-10 py-6">
    <div class="primjudul textprim">
        Daftar Kos-kosan Sukorame
    </div>

    <div class="flex items-center gap-3">
        <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 w-80 shadow-sm">
            <i class="fas fa-search text-gray-400 mr-2"></i>
            <input
                type="text"
                placeholder="Cari nama kos di Kelurahan Sukorame"
                class="outline-none w-full text-sm text-gray-700"
            />
        </div>

        <button
            class="flex items-center gap-2 border border-gray-300 rounded-xl px-4 py-2 text-gray-500 hover:bg-gray-100 transition">
            <i class="fas fa-filter"></i>
            <span>Filter</span>
            <i class="fas fa-chevron-down text-sm"></i>
        </button>
    </div>
</div>

</div>
<!-- search -->


<div class="px-12 grid grid-cols-12 gap-3">
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Kos Bu Rahmat</h3>
                <div class="tagcwe">
                    Kos Perempuan
                </div>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagcwo">Kos Laki-laki</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagbeb">Kos Bebas</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagbeb">Kos Bebas</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
</div>

<!-- row bawah -->
<div class="px-12 pt-12 mb-20 grid grid-cols-12 gap-3">
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Kos Bu Rahmat</h3>
                <div class="tagcwo">
                    Kos Perempuan
                </div>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagcwo">Kos Laki-laki</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagcwe">Kos Bebas</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
    <div class="card col-span-3">
        <img src="img/kos1.svg" alt="gbrkos">
        <div class="card-content">
            <div class="card-header">
                <h3>Nama Kos</h3>
                <span class="tagbeb">Kos Bebas</span>
            </div>
            <p class="location">
                <i class="fas fa-map-marker-alt"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
</div>
<!-- klo dh make database noh -->

@endsection
