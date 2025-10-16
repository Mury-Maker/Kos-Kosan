@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas Kos')

@section('content')

<div class="data-kos mt-2 p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Data Fasilitas & Kapasitas</h2>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.form_kelola_fasilitas') }}" class="border border-[#17DD2B] bg-[#17DD2B] text-white px-4 py-2 rounded-full hover:bg-white hover:text-[#17DD2B] transition">
            <i class="fas fa-plus"></i> Tambah Fasilitas/Kapasitas
        </a>

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
                <img class="w-5 h-5" src="{{ asset('img/Vector.png') }}" alt="Filter">
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse rounded-lg shadow-md overflow-hidden">
            <thead>
                <tr class="bg-[#704E98] text-white text-left">
                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3">Nama Fasilitas/Kapasitas</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($fasilitas as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->nama_fasilitas }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                             <a href="{{ route('admin.form_kelola_fasilitas', $item->id_fasilitas) }}"
                               class="text-blue-500 hover:text-blue-700 text-lg">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- Tombol Hapus (DELETE request via form) --}}
                            <form action="{{ route('admin.destroy_fasilitas', $item->id_fasilitas) }}" method="POST" onsubmit="return confirm('Menghapus Fasilitas ini akan memutus hubungan dengan Kos yang menggunakannya. Lanjutkan?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-lg">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center text-gray-500">Belum ada fasilitas yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
