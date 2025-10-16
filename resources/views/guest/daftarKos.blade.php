@extends('guest.layouts.app')

@section('title', 'Data Kos Resmi Kelurahan Sukorame')

@section('content')

@php use Illuminate\Support\Str; @endphp

<div class="p-12 mt-8 flex justify-between items-center px-10 py-6">
    <div class="primjudul textprim">
        Daftar Kos-kosan Sukorame
    </div>

    <form method="GET" action="{{ route('daftarKos') }}" class="flex items-center gap-3">
        <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 w-80 shadow-sm">
            <i class="fas fa-search text-gray-400 mr-2"></i>
            <input
                type="text"
                name="search"
                placeholder="Cari nama kos di Kelurahan Sukorame"
                value="{{ request('search') }}"
                class="outline-none w-full text-sm text-gray-700"
            />
        </div>

        {{-- Dropdown Filter --}}
        <select name="tipe" onchange="this.form.submit()"
                class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2 text-gray-500 shadow-sm focus:ring-[#704E98] focus:border-[#704E98] transition">
            <option value="">Filter: Semua Tipe</option>
            <option value="putra" {{ request('tipe') == 'putra' ? 'selected' : '' }}>Kos Laki-laki</option>
            <option value="putri" {{ request('tipe') == 'putri' ? 'selected' : '' }}>Kos Perempuan</option>
            <option value="bebas" {{ request('tipe') == 'bebas' ? 'selected' : '' }}>Kos Bebas</option>
        </select>

        <button type="submit" class="bg-[#704E98] text-white rounded-full px-4 py-2 hover:bg-[#512D84] transition" title="Terapkan Filter">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>


<div class="px-12 mb-20 grid grid-cols-12 gap-3">

    @forelse ($listKos as $item)
        @php
            // Menentukan class dan label tipe kos
            $tipeData = [
                'putri' => ['label' => 'Kos Perempuan', 'class' => 'tagcwe'],
                'putra' => ['label' => 'Kos Laki-laki', 'class' => 'tagcwo'],
                'campuran' => ['label' => 'Kos Bebas', 'class' => 'tagbeb'],
            ][$item->tipe_kos] ?? ['label' => 'Tipe Tidak Dikenal', 'class' => 'tagbeb'];

            // Mengambil range harga
            $hargaRange = optional($item->hargaKamar->first());
            $hargaTampil = ($hargaRange->harga_terendah && $hargaRange->harga_tertinggi)
                           ? 'Rp '.number_format($hargaRange->harga_terendah, 0, ',', '.').' - '.number_format($hargaRange->harga_tertinggi, 0, ',', '.')
                           : 'Hubungi Pemilik';

            // Mengambil URL gambar
            $gambarUrl = $item->gambar->first()->url_gambar ?? asset('img/kos1.svg');
        @endphp

        {{-- STRUKTUR CARD ASLI ANDA --}}
        <div class="card col-span-3 bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden">

            {{-- OPTIONAL: Bungkus Seluruh Konten Card dengan Link Detail untuk UX yang lebih baik --}}
            <a href="{{ route('kos.detail', $item->id_kos) }}" class="block">

                <img src="{{ $gambarUrl }}" alt="Foto Kos {{ $item->nama_kos }}" class="w-full h-48 object-cover">

                <div class="card-content p-4 space-y-2">
                    <div class="card-header flex justify-between items-start">
                        <h3 class="text-xl font-bold text-gray-800">{{ Str::limit($item->nama_kos, 20) }}</h3>

                        <span class="{{ $tipeData['class'] }} text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">
                            {{ $tipeData['label'] }}
                        </span>
                    </div>

                    {{-- Tambahan Harga (Di bawah tag) --}}
                    <p class="text-[#704E98] font-bold text-lg mt-1">{{ $hargaTampil }}</p>

                    <p class="location text-gray-600 text-sm">
                        <i class="fas fa-map-marker-alt mr-2 text-red-500"></i> {{ Str::limit($item->alamat_lengkap, 30) }}
                    </p>

                    <p class="text-gray-500 text-sm">
                        Kamar Tersedia: {{ $item->jumlah_kamar_tersedia ?? 0 }}
                    </p>

                    {{-- PERBAIKAN LINK DETAIL PADA TOMBOL (Dibuat hanya jika Anda tidak menggunakan link seluruh card) --}}
                    {{-- JIKA Anda ingin tetap menggunakan link terpisah: --}}
                    <span class="inline-block mt-2 text-[#704E98] hover:underline text-sm font-medium">
                        Lihat Detail <i class="fas fa-chevron-right text-xs"></i>
                    </span>
                </div>
            </a>

        </div>

    @empty
        <div class="col-span-12 text-center py-10 text-gray-500">
            <i class="fas fa-box-open text-6xl mb-4"></i>
            <p>Maaf, tidak ada data kos yang ditemukan sesuai kriteria pencarian Anda.</p>
        </div>
    @endforelse
</div>

{{-- Pagination --}}
<div class="px-12 mb-10">
    {{ $listKos->links() }}
</div>

@endsection
