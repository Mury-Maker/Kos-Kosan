@extends('owner.layouts.app')

@section('title', $kos->exists ? 'Edit Data Kos' : 'Tambah Data Kos')

@section('content')

{{-- ASUMSI: $kos, $fasilitas dikirim dari OwnerKosController --}}

<div class="p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $kos->exists ? 'Edit Data Kos' : 'Tambah Data Kos' }}</h2>

    <div class="bg-white rounded-2xl shadow p-6">
        <form method="POST" action="{{ $kos->exists ? route('owner.update_kos', $kos->id_kos) : route('owner.store_kos') }}">
            @csrf
            @if($kos->exists)
                @method('PUT')
            @endif

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    Pastikan semua input sudah benar.
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">

                <div>
                    <label for="nama_kos" class="block font-semibold text-gray-700 mb-2">Nama Kos</label>
                    <input type="text" id="nama_kos" name="nama_kos" value="{{ old('nama_kos', $kos->nama_kos ?? '') }}"
                           placeholder="Masukkan nama kos"
                           class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('nama_kos') border-red-500 @enderror">
                    @error('nama_kos')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="tipe_kos" class="block font-semibold text-gray-700 mb-2">Tipe Kos</label>
                    <select id="tipe_kos" name="tipe_kos"
                            class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('tipe_kos') border-red-500 @enderror">
                        @php $currentTipe = old('tipe_kos', $kos->tipe_kos ?? ''); @endphp
                        <option value="putra" {{ $currentTipe == 'putra' ? 'selected' : '' }}>Putra</option>
                        <option value="putri" {{ $currentTipe == 'putri' ? 'selected' : '' }}>Putri</option>
                        <option value="campuran" {{ $currentTipe == 'campuran' ? 'selected' : '' }}>Campuran</option>
                    </select>
                    @error('tipe_kos')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label for="alamat_lengkap" class="block font-semibold text-gray-700 mb-2">Alamat Kos</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan alamat lengkap kos"
                              class="w-full border border-purple-300 rounded-2xl px-4 py-2 h-20 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('alamat_lengkap') border-red-500 @enderror">{{ old('alamat_lengkap', $kos->alamat_lengkap ?? '') }}</textarea>
                    @error('alamat_lengkap')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Bagian Harga --}}
                <div class="flex gap-4 md:col-span-2">
                    @php $hargaKamar = $kos->harga_kamar; @endphp
                    <div class="flex-1">
                        <label for="harga_terendah" class="block font-semibold text-gray-700 mb-2">Harga Terendah</label>
                        <input type="number" id="harga_terendah" name="harga_terendah" value="{{ old('harga_terendah', $hargaKamar->harga_terendah ?? '') }}"
                               placeholder="Rp..." class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('harga_terendah') border-red-500 @enderror">
                        @error('harga_terendah')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex-1">
                        <label for="harga_tertinggi" class="block font-semibold text-gray-700 mb-2">Harga Tertinggi</label>
                        <input type="number" id="harga_tertinggi" name="harga_tertinggi" value="{{ old('harga_tertinggi', $hargaKamar->harga_tertinggi ?? '') }}"
                               placeholder="Rp..." class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('harga_tertinggi') border-red-500 @enderror">
                        @error('harga_tertinggi')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Bagian Jumlah Kamar dan Penghuni --}}
                <div class="grid grid-cols-3 gap-4 md:col-span-2">
                    <div>
                        <label for="jumlah_kamar_total" class="block font-semibold text-gray-700 mb-2">Jumlah Total Kamar</label>
                        <input type="number" id="jumlah_kamar_total" name="jumlah_kamar_total" value="{{ old('jumlah_kamar_total', $kos->jumlah_kamar_total ?? '') }}"
                               placeholder="0" class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('jumlah_kamar_total') border-red-500 @enderror">
                        @error('jumlah_kamar_total')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="jumlah_kamar_tersedia" class="block font-semibold text-gray-700 mb-2">Jumlah Kamar Tersedia</label>
                        <input type="number" id="jumlah_kamar_tersedia" name="jumlah_kamar_tersedia" value="{{ old('jumlah_kamar_tersedia', $kos->jumlah_kamar_tersedia ?? '') }}"
                               placeholder="0" class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('jumlah_kamar_tersedia') border-red-500 @enderror">
                        @error('jumlah_kamar_tersedia')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="jumlah_penghuni_saat_ini" class="block font-semibold text-gray-700 mb-2">Jumlah Penghuni</label>
                        <input type="number" id="jumlah_penghuni_saat_ini" name="jumlah_penghuni_saat_ini" value="{{ old('jumlah_penghuni_saat_ini', $kos->jumlah_penghuni_saat_ini ?? '') }}"
                               placeholder="0" class="w-full border border-purple-300 rounded-full px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:outline-none @error('jumlah_penghuni_saat_ini') border-red-500 @enderror">
                        @error('jumlah_penghuni_saat_ini')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="flex justify-between mt-4 md:col-span-2">
                    <a href="{{ route('owner.kelolaKos') }}" class="bg-gray-500 text-white px-8 py-2 rounded-full font-semibold hover:bg-gray-600 transition">
                        ← Kembali
                    </a>
                    <button type="submit" class="bg-orange-400 text-white px-8 py-2 rounded-full font-semibold hover:bg-orange-500 transition">
                        {{ $kos->exists ? 'Perbarui Data' : 'Simpan Data' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
