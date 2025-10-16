@extends('admin.layouts.app')

@section('title', isset($pemilik) ? 'Edit Pemilik Kos' : 'Tambah Pemilik Kos')

@section('content')

<div class="flex justify-center mt-6">
    <div class="w-full md:w-2/3 lg:w-1/2 bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-left">{{ isset($pemilik) ? 'Edit Data' : 'Tambah Data' }} Pemilik Kos</h2>

        <form method="POST" action="{{ isset($pemilik) ? route('admin.update_pemilik', $pemilik->id_pemilik) : route('admin.store_pemilik') }}">
            @csrf
            {{-- Method Spoofing untuk Update --}}
            @if(isset($pemilik))
                @method('PUT')
            @endif

            <div class="mb-6">
                <label for="nama_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemilik Kos</label>
                <input
                    type="text"
                    id="nama_pemilik"
                    name="nama_pemilik"
                    value="{{ old('nama_pemilik', $pemilik->nama_pemilik ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nama_pemilik') border-red-500 @enderror"
                    placeholder="Masukkan nama Pemilik Kos">
                @error('nama_pemilik')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="alamat_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Alamat Pemilik</label>
                <input
                    type="text"
                    id="alamat_pemilik"
                    name="alamat_pemilik"
                    value="{{ old('alamat_pemilik', $pemilik->alamat_pemilik ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('alamat_pemilik') border-red-500 @enderror"
                    placeholder="Masukkan Alamat Pemilik">
                @error('alamat_pemilik')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input
                    type="text"
                    id="nomor_telepon"
                    name="nomor_telepon"
                    value="{{ old('nomor_telepon', $pemilik->nomor_telepon ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nomor_telepon') border-red-500 @enderror"
                    placeholder="Masukkan Nomor Telepon">
                @error('nomor_telepon')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('admin.kelola_pemilik_kos') }}"
                    class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600 transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit"
                    class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
                    {{ isset($pemilik) ? 'Perbarui Data' : 'Simpan Data' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
