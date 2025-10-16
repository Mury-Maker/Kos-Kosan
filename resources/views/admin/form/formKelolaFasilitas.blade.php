@extends('admin.layouts.app')

@section('title', isset($fasilitas) ? 'Edit Fasilitas' : 'Tambah Fasilitas')

@section('content')

<div class="flex justify-center mt-6">
    <div class="w-full md:w-1/2 bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-left">{{ isset($fasilitas) ? 'Edit' : 'Tambah' }} Fasilitas/Kapasitas</h2>

        <form method="POST" action="{{ isset($fasilitas) ? route('admin.update_fasilitas', $fasilitas->id_fasilitas) : route('admin.store_fasilitas') }}">
            @csrf
            @if(isset($fasilitas))
                @method('PUT')
            @endif

            <div class="mb-6">
                <label for="nama_fasilitas" class="block text-sm font-medium text-gray-700 mb-2">Nama Fasilitas/Kapasitas</label>
                <input
                    type="text"
                    id="nama_fasilitas"
                    name="nama_fasilitas"
                    value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nama_fasilitas') border-red-500 @enderror"
                    placeholder="Contoh: AC, WiFi, atau Kapasitas: 2 Orang">
                @error('nama_fasilitas')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('admin.kelola_fasilitas') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit"
                    class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
                    {{ isset($fasilitas) ? 'Perbarui' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
