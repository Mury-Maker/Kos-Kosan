@extends('owner.layouts.app')

@section('title', 'Dashboard Owner')

@section('content')

{{-- Title --}}
<h2 class="text-2xl font-bold mb-6 ml-6">Dashboard</h2>

{{-- Card Statistik --}}
<div class="px-6 mb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Pembaruan -->
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-[#1ABC9C]">
            <h3 class="text-[#1ABC9C] font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-sync-alt"></i> Pembaruan
            </h3>
            <div class="flex items-end justify-between mt-3">
                <h1 class="text-5xl font-bold text-[#1ABC9C]">5</h1>
                <p class="text-gray-500">data</p>
            </div>
        </div>

        <!-- Total Kamar -->
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-[#FFA700]">
            <h3 class="text-[#FFA700] font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-door-closed"></i> Total Kamar
            </h3>
            <div class="flex items-end justify-between mt-3">
                <h1 class="text-5xl font-bold text-[#FFA700]">15</h1>
                <p class="text-gray-500">kamar</p>
            </div>
        </div>

        <!-- Kamar Terpakai -->
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-[#F96464]">
            <h3 class="text-[#F96464] font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-bed"></i> Kamar Terpakai
            </h3>
            <div class="flex items-end justify-between mt-3">
                <h1 class="text-5xl font-bold text-[#F96464]">13</h1>
                <p class="text-gray-500">kamar</p>
            </div>
        </div>

        <!-- Kamar Tersedia -->
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-[#1D91FF]">
            <h3 class="text-[#1D91FF] font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-door-open"></i> Kamar Tersedia
            </h3>
            <div class="flex items-end justify-between mt-3">
                <h1 class="text-5xl font-bold text-[#1D91FF]">2</h1>
                <p class="text-gray-500">kamar</p>
            </div>
        </div>

        <!-- Penghuni Kos -->
        <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-[#800080]">
            <h3 class="text-[#800080] font-semibold text-lg flex items-center gap-2">
                <i class="fas fa-user-friends"></i> Penghuni Kos
            </h3>
            <div class="flex items-end justify-between mt-3">
                <h1 class="text-5xl font-bold text-[#800080]">14</h1>
                <p class="text-gray-500">orang</p>
            </div>
        </div>
    </div>
</div>

{{-- Data Kos --}}
<div class="bg-white rounded-2xl shadow-md mx-6 p-6 mb-8">
    <h2 class="text-2xl font-bold mb-4">Data Kos</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-[#5D4B7A] text-white font-semibold">
                <tr>
                    <th class="px-4 py-2 text-left rounded-l-lg">No</th>
                    <th class="px-4 py-2 text-left">Total Kamar</th>
                    <th class="px-4 py-2 text-left">Kamar Terpakai</th>
                    <th class="px-4 py-2 text-left">Kamar Tersedia</th>
                    <th class="px-4 py-2 text-left">Jumlah Penghuni</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop data Kos --}}
                @forelse ($kosList as $kos)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $kos->jumlah_kamar_total }}</td>
                    <td class="px-4 py-2">{{ $kos->jumlah_kamar_total - $kos->jumlah_kamar_tersedia }}</td>
                    <td class="px-4 py-2">{{ $kos->jumlah_kamar_tersedia }}</td>
                    <td class="px-4 py-2">{{ $kos->jumlah_penghuni_saat_ini }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center p-4">Anda belum memiliki data Kos.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Data Detail Kos --}}
<div class="bg-white rounded-2xl shadow-md mx-6 p-6 mb-8">
    <h2 class="text-2xl font-bold mb-4">Data Detail Kos</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-[#5D4B7A] text-white font-semibold">
                <tr>
                    <th class="px-4 py-2 text-left rounded-l-lg">No</th>
                    <th class="px-4 py-2 text-left">Nama Kos</th>
                    <th class="px-4 py-2 text-left">Tipe Kos</th>
                    <th class="px-4 py-2 text-left">Alamat Kos</th>
                    <th class="px-4 py-2 text-left">No Telp</th>
                    <th class="px-4 py-2 text-left">Harga Rentang</th>
                    <th class="px-4 py-2 text-left rounded-r-lg">Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kosList as $kos)
                    @php
                        // Ambil data relasi (fasilitas dan harga)
                        $kos->loadMissing('pemilik', 'hargaKamar', 'fasilitas');
                        $harga = $kos->hargaKamar->first();
                        $hargaTampil = ($harga) ? 'Rp '.number_format($harga->harga_terendah).' - '.number_format($harga->harga_tertinggi) : 'N/A';
                        $fasilitasTampil = $kos->fasilitas->pluck('nama_fasilitas')->take(3)->implode(', ') ?: 'N/A';
                    @endphp
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $kos->nama_kos }}</td>
                    <td class="px-4 py-2 capitalize">{{ $kos->tipe_kos }}</td>
                    <td class="px-4 py-2">{{ $kos->alamat_lengkap }}</td>
                    <td class="px-4 py-2">{{ $kos->pemilik->nomor_telepon ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $hargaTampil }}</td>
                    <td class="px-4 py-2">{{ $fasilitasTampil }}</td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center p-4">Anda belum memiliki data Kos.</td></tr>
                @endforelse
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
