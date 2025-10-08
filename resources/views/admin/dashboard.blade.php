@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
{{-- Title --}}
<h2 class="text-2xl font-bold mb-6 ml-6">Dashboard</h2>

{{-- card body --}}
<div class="px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Card 1 -->
        <a href="#pembaruan"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#1ABC9C]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Pembaruan
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#1ABC9C]">5</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#1ABC9C]"></i>
            </div>
        </a>
        <!-- Card 2 -->
        <a href="#pembaruan"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#FFA700]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Terdaftar
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#FFA700]">25</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#FFA700]"></i>
            </div>
        </a>
        <!-- Card 3 -->
        <a href="#pembaruan"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#1D91FF]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Laki-laki
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#1D91FF]">18</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#1D91FF]"></i>
            </div>
        </a>
        <!-- Card 3 -->
        <a href="#pembaruan"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#F96464]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Perempuan
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#F96464]">2</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#F96464]"></i>
            </div>
        </a>
        <!-- Card 5 -->
        <a href="#pembaruan"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#800080]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Bebas
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#800080]">2</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#800080]"></i>
            </div>
        </a>
    </div>
</div>

{{-- data kos --}}
<div class="data-kos mt-6 px-6 py-4 bg-white rounded-2xl shadow-md">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold">Pendataan Kos</h3>
        <div class="flex items-center">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-500"></i>
                </div>
                <input type="search" placeholder="Cari data..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#1ABC9C] focus:border-[#1ABC9C] text-gray-600 placeholder-gray-400" />
            </div>
            <button class="btn-filter ml-4 p-2 rounded-full hover:bg-gray-100 transition">
                <img class="w-6 h-6" src="{{ asset('img/Vector.png') }}" alt="Filter">
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Kos</th>
                    <th class="px-4 py-2 text-left">Alamat Kos</th>
                    <th class="px-4 py-2 text-left">Pemilik Kos</th>
                    <th class="px-4 py-2 text-left">Status Kos</th>
                    <th class="px-4 py-2 text-left">Jenis Kos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">Kos Sejahtera</td>
                    <td class="border px-4 py-2">Jl. Contoh No. 123</td>
                    <td class="border px-4 py-2">Budi Santoso</td>
                    <td class="border px-4 py-2">Aktif</td>
                    <td class="border px-4 py-2">Campur</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">Kos Putri Idaman</td>
                    <td class="border px-4 py-2">Jl. Mawar No. 45</td>
                    <td class="border px-4 py-2">Siti Aminah</td>
                    <td class="border px-4 py-2">Aktif</td>
                    <td class="border px-4 py-2">Putri</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- map --}}
<div class="map mt-6 p-6 bg-white rounded-2xl shadow-md">
    <h3 class="text-lg font-semibold mb-4">Peta Sebaran Kos di Sukorame</h3>
    <div class="w-full h-96 md:h-[480px]">
        <iframe class="w-full h-full"  title="Peta Kos"></iframe>
    </div>
</div>

@endsection
