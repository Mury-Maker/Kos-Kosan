@extends('owner.layouts.app')

@section('title', 'Kelola Data Kos Saya')

@section('content')
<div class="p-6">

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="p-4 mb-4 text-sm text-orange-800 rounded-lg bg-orange-50" role="alert">
            {{ session('warning') }}
        </div>
    @endif

    {{-- Judul Halaman dan Tombol Tambah --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Kos Saya</h2>
        {{-- Tombol mengarah ke form tambah kos --}}
        <a href="{{ route('owner.form_kos') }}" class="bg-orange-400 text-white px-6 py-2 rounded-full font-semibold hover:bg-orange-500 transition duration-200 shadow">
            <i class="fas fa-plus mr-2"></i> Tambah Kos
        </a>
    </div>

    {{-- Tabel Data Kos --}}
    <div class="overflow-x-auto bg-white rounded-2xl shadow-xl">
        <table class="min-w-full text-base text-left text-gray-800 border-collapse">
            <thead class="text-sm uppercase text-white" style="background-color: #704E98;">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Kos</th>
                    <th class="px-4 py-3">Tipe Kos</th>
                    <th class="px-4 py-3">Harga (Range)</th>
                    <th class="px-4 py-3">Kmr Sedia / Total</th>
                    <th class="px-4 py-3">Penghuni</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($kos as $item)
                    @php
                        $hargaKamar = optional($item->hargaKamar->first());
                        $hargaDisplay = 'Rp ' . number_format($hargaKamar->harga_terendah ?? 0, 0, ',', '.') . ' - ' . number_format($hargaKamar->harga_tertinggi ?? 0, 0, ',', '.');
                    @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $item->nama_kos }}</td>
                        <td class="px-4 py-3 capitalize">{{ $item->tipe_kos }}</td>
                        <td class="px-4 py-3 text-sm text-green-700 font-medium">{{ $hargaDisplay }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_kamar_tersedia }} / {{ $item->jumlah_kamar_total }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah_penghuni_saat_ini }}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('owner.form_kos', $item->id_kos) }}" class="text-yellow-500 hover:text-yellow-600" title="Edit Data">
                                <i class="fas fa-pen-square text-2xl"></i>
                            </a>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('owner.destroy_kos', $item->id_kos) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus Kos {{ $item->nama_kos }}? Ini akan menghapus semua data terkait.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus Kos">
                                    <i class="fas fa-trash-alt text-2xl"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-3 text-center italic" colspan="7">Anda belum memiliki data kos yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
