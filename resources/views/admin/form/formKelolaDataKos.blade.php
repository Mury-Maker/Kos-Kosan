@extends('admin.layouts.app')

@section('title', 'Kelola Data Kos')

@section('content')
{{-- Title --}}

{{-- tambah data kos --}}
<div class="data-kos mt-2 p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Tambah Kos</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Nama Kos -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kos</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan nama kos">
        </div>

        <!-- Pemilik Kos -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik Kos</label>
            <select
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]">
                <option value="" disabled selected>Pilih Pemilik Kos</option>
                <option value="1">Pemilik Kos 1</option>
                <option value="2">Pemilik Kos 2</option>
                <option value="3">Pemilik Kos 3</option>
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi kos</label>
            <textarea
                rows="3"
                class="w-full px-4 py-2 border rounded-2xl focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan Deskripsi kos"></textarea>
        </div>

        <!-- Alamat Kos (full width) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Kos</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan alamat kos">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Kos</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan tipe kos">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Handphone</label>
            <input
                type="text"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan nomor handphone">
        </div>




        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jumlah total kamar
                </label>
                <input
                type="number"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                    placeholder="Masukkan jumlah kamar">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jumlah kamar tersedia
                </label>
                <input
                type="number"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan jumlah kamar tersedia">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jumlah penghuni saat ini
                </label>
                <input
                type="number"
                class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                placeholder="Masukkan jumlah penghuni saat ini">
            </div>
        </div>

        <!-- Koordinat -->
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Koordinat</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input
                    type="number"
                    step="any"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                    placeholder="Masukkan lintang (contoh: -6.9123)">
                <input
                    type="number"
                    step="any"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                    placeholder="Masukkan bujur (contoh: 107.6123)">
            </div>
        </div>

        <!-- Kisaran Harga Sewa -->
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Kisaran Harga Sewa</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input
                    type="number"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                    placeholder="Harga Terendah">
                <input
                    type="number"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98]"
                    placeholder="Harga Tertinggi">
            </div>
        </div>

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
@endsection
