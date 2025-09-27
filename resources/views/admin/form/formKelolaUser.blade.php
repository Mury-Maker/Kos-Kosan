@extends('admin.layouts.app')

@section('title', 'Kelola Data Kos')

@section('content')
{{-- Title --}}

{{-- tambah data fasilitas --}}
<div class="flex justify-left mt-6">
    <div class="w-full md:w-1/2 bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-left">Tambah User</h2>

        <!-- Nama Fasilitas -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pemilik Kos</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan nama Pemilik Kos">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Pemilik</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan Alamat Pemilik">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan Nomor Telepon">
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
