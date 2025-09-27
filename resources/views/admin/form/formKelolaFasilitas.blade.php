@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas Kos')

@section('content')
{{-- tambah data fasilitas --}}
<div class="flex justify-left mt-6">
    <div class="w-full md:w-1/2 bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-left">Tambah Fasilitas</h2>

        <!-- Nama Fasilitas -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Fasilitas</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan nama fasilitas">
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6 flex justify-between items-center">
            <button
                class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
               <- Kembali
            </button>
            <button
                class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
                Simpan
            </button>
        </div>
    </div>
</div>
@endsection
