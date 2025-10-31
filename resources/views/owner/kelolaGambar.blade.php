@extends('owner.layouts.app')

@section('title', 'Kelola Gambar Kos')

@section('content')

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Pilih Kos untuk Kelola Gambar</h3>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-sm text-gray-600 mb-6">
        Pilih unit kos di bawah ini untuk menambah atau menghapus foto-foto Kos tersebut.
    </p>

    {{-- Daftar Kos yang bisa diklik --}}
    @forelse ($kos as $itemKos)
        <div class="mb-4 border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-200">

            {{-- Tombol/Link untuk mengedit Gambar Kos spesifik --}}
            <a href="{{ route('owner.form_gambar', ['kos' => $itemKos->id_kos]) }}"
               class="p-4 flex justify-between items-center text-white bg-[#704E98] hover:bg-[#5D4B7A] transition">

                <h4 class="text-xl font-bold">
                    {{ $itemKos->nama_kos }} ({{ ucfirst($itemKos->tipe_kos) }})
                </h4>

                <span class="text-sm font-semibold whitespace-nowrap">
                    Kelola {{ $itemKos->gambar_count }} Gambar →
                </span>
            </a>
        </div>
    @empty
        <div class="p-6 text-center text-gray-600 border border-gray-200 rounded-xl shadow-lg">
            <i class="fas fa-camera text-4xl mb-3 text-gray-400"></i>
            <p class="italic font-medium">Anda belum memiliki data kos yang terdaftar.</p>
        </div>
    @endforelse
</div>
@endsection
