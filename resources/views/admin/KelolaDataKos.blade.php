@extends('admin.layouts.app')

@section('title', 'Kelola Data Kos')

@section('content')

<div class="data-kos mt-2 p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Pendataan Kos</h2>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.form_kos') }}" class="border border-[#17DD2B] bg-[#17DD2B] text-white px-4 py-2 rounded-full hover:bg-white hover:text-[#17DD2B] transition">
            <i class="fas fa-plus"></i> Tambah Kos
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
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Kos</th>
                    <th class="px-4 py-3">Alamat Kos</th>
                    <th class="px-4 py-3">Pemilik Kos</th>
                    <th class="px-4 py-3">Jml Kamar Tersedia</th>
                    <th class="px-4 py-3">Jml Penghuni</th>
                    <th class="px-4 py-3">Jenis Kos</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($kos as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->nama_kos }}</td>
                        <td class="px-4 py-3">{{ $item->alamat_lengkap }}</td>
                        <td class="px-4 py-3">{{ $item->pemilik->nama_pemilik ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_kamar_tersedia }} / {{ $item->jumlah_kamar_total }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_penghuni_saat_ini }}</td>
                        <td class="px-4 py-3 capitalize">{{ $item->tipe_kos }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('admin.form_kos', $item->id_kos) }}" class="text-blue-500 hover:text-blue-700 text-lg"><i class="fas fa-edit"></i></a>
                            {{-- Form Hapus (Uncomment jika route destroy sudah dibuat) --}}
                            {{-- <form action="{{ route('admin.destroy_kos', $item->id_kos) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus Kos ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-lg"><i class="fas fa-trash"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-3 text-center text-gray-500">Belum ada data kos yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
