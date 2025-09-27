@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas Kos')

@section('content')

{{-- data kos --}}
<div class="data-kos mt-2 p-6 bg-white rounded-2xl shadow-md">
    {{-- Title --}}
    <h2 class="text-2xl font-bold mb-6">Data Fasilitas</h2>

    <div class="flex items-center justify-between mb-4">
        <!-- Tombol Tambah -->
        <a href="/admin/form/formKelolaFasilitas" class="border border-[#17DD2B] bg-[#17DD2B] text-white px-4 py-2 rounded-full hover:bg-white hover:text-[#17DD2B] transition">
            <i class="fas fa-plus"></i> Tambah Fasilitas
        </a>

        <!-- Search + Filter -->
        <div class="flex items-center space-x-2">
            <div class="relative w-full max-w-xs">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-500"></i>
                </div>
                <input
                type="search"
                placeholder="Cari data..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#17DD2B] focus:border-[#17DD2B] text-gray-600 placeholder-gray-400"
                />
            </div>

            <button class="btn-filter p-2 rounded-full hover:bg-gray-100 transition">
                <img class="w-5 h-5" src="img/Vector.png" alt="Filter">
      </button>
    </div>
</div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse rounded-lg shadow-md overflow-hidden">
            <thead>
                <tr class="bg-[#704E98] text-white text-left">
                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3">Nama Fasilitas</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-center">1</td>
                    <td class="px-4 py-3">AC</td>
                    <td class="px-4 py-3"></td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-center">2</td>
                    <td class="px-4 py-3">Kasur</td>
                    <td class="px-4 py-3"></td>
                </tr>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-center">3</td>
                    <td class="px-4 py-3">Lemari</td>
                    <td class="px-4 py-3"></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

@endsection
