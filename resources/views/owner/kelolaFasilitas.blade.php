@extends('owner.layouts.app')

@section('title', 'Kelola Fasilitas Kos')

@section('content')

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Pilih Kos untuk Kelola Fasilitas</h3>
    </div>

    <p class="text-sm text-gray-600 mb-6">
        Silakan pilih unit kos di bawah ini untuk mengatur fasilitas dan harga sewanya secara detail.
    </p>

    {{-- KOREKSI: Loop menggunakan $kos (daftar kos milik owner) --}}
    @forelse ($kos as $itemKos)
        <div class="mb-4 border border-gray-200 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-200">

            {{-- Tombol/Link untuk mengedit Fasilitas Kos spesifik --}}
            <a href="{{ route('owner.form_fasilitas', ['kos' => $itemKos->id_kos]) }}"
               class="p-4 flex justify-between items-center text-white bg-[#704E98] hover:bg-[#5D4B7A] transition">

                <h4 class="text-xl font-bold">
                    {{ $itemKos->nama_kos }} ({{ ucfirst($itemKos->tipe_kos) }})
                </h4>

                <span class="text-sm font-semibold whitespace-nowrap">
                    Kelola Fasilitas →
                </span>
            </a>

            {{-- Ringkasan Fasilitas Saat Ini --}}
            <div class="p-4 bg-white text-gray-700">
                <span class="font-medium">Fasilitas Utama:</span>
                @if ($itemKos->fasilitas->isEmpty())
                    <span class="italic text-red-500">Belum ada fasilitas terpasang.</span>
                @else
                    {{-- Menampilkan 3 fasilitas teratas --}}
                    {{ $itemKos->fasilitas->pluck('nama_fasilitas')->take(3)->implode(', ') }}
                    @if($itemKos->fasilitas->count() > 3)
                        ... (+{{ $itemKos->fasilitas->count() - 3 }} lainnya)
                    @endif
                @endif
            </div>
        </div>
    @empty
        <div class="p-6 text-center text-gray-600 border border-gray-200 rounded-xl shadow-lg">
            <i class="fas fa-home text-4xl mb-3 text-gray-400"></i>
            <p class="italic font-medium">Anda belum memiliki data kos yang terdaftar. Mohon daftarkan di menu Kelola Kos.</p>
        </div>
    @endforelse
</div>
@endsection
