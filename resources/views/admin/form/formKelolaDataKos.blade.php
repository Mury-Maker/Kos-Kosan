@extends('admin.layouts.app')

{{-- Judul menggunakan $kos->exists (mode Edit atau Tambah) --}}
@section('title', $kos->exists ? 'Edit Data Kos' : 'Tambah Data Kos')

{{-- SECTION STYLES: Untuk Leaflet CSS --}}
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map-picker { height: 350px; width: 100%; border-radius: 0.5rem; margin-top: 10px; }
    </style>
@endsection

@section('content')

<div class="data-kos mt-2 p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">{{ $kos->exists ? 'Edit Data' : 'Tambah Data' }} Kos</h2>

    {{-- ASUMSI: $kos, $pemilik, $fasilitas sudah dikirimkan dari Controller --}}

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- INI YANG PALING PENTING --}}
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <strong>Gagal!</strong> {{ session('error') }}
        </div>
    @endif
    {{-- LOGIKA ACTION FORM TAHAN ERROR: Menggunakan $kos->exists --}}
    <form method="POST" action="{{ $kos->exists ? route('admin.update_kos', $kos->id_kos) : route('admin.store_kos') }}">
        @csrf
        @if($kos->exists)
            @method('PUT')
        @endif

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                Pastikan semua input sudah benar.
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nama_kos" class="block text-sm font-medium text-gray-700 mb-2">Nama Kos</label>
                <input
                    type="text"
                    id="nama_kos"
                    name="nama_kos"
                    value="{{ old('nama_kos', $kos->nama_kos ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nama_kos') border-red-500 @enderror"
                    placeholder="Masukkan nama kos">
                @error('nama_kos')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="id_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Pemilik Kos</label>
                <select
                    id="id_pemilik"
                    name="id_pemilik"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('id_pemilik') border-red-500 @enderror">
                    <option value="" disabled selected>Pilih Pemilik Kos</option>

                    @foreach ($pemilik as $p)
                        <option value="{{ $p->id_pemilik }}" {{ old('id_pemilik', $kos->id_pemilik ?? '') == $p->id_pemilik ? 'selected' : '' }}>
                            {{ $p->nama_pemilik }} ({{ $p->user->email ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
                @error('id_pemilik')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Alamat Kos</label>
                <input
                    type="text"
                    id="alamat_lengkap"
                    name="alamat_lengkap"
                    value="{{ old('alamat_lengkap', $kos->alamat_lengkap ?? '') }}"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('alamat_lengkap') border-red-500 @enderror"
                    placeholder="Masukkan alamat kos">
                @error('alamat_lengkap')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="tipe_kos" class="block text-sm font-medium text-gray-700 mb-2">Tipe Kos</label>
                <select
                    id="tipe_kos"
                    name="tipe_kos"
                    class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('tipe_kos') border-red-500 @enderror">
                    @php $currentTipe = old('tipe_kos', $kos->tipe_kos ?? ''); @endphp
                    <option value="putra" {{ $currentTipe == 'putra' ? 'selected' : '' }}>Putra</option>
                    <option value="putri" {{ $currentTipe == 'putri' ? 'selected' : '' }}>Putri</option>
                    <option value="bebas" {{ $currentTipe == 'bebas' ? 'selected' : '' }}>Bebas</option>
                </select>
                @error('tipe_kos')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="deskripsi_kos" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi kos</label>
                <textarea
                    id="deskripsi_kos"
                    name="deskripsi_kos"
                    rows="3"
                    class="w-full px-4 py-2 border rounded-2xl focus:ring-[#704E98] focus:border-[#704E98] @error('deskripsi_kos') border-red-500 @enderror"
                    placeholder="Masukkan Deskripsi kos">{{ old('deskripsi_kos', $kos->deskripsi_kos ?? '') }}</textarea>
                @error('deskripsi_kos')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="jumlah_kamar_total" class="block text-sm font-medium text-gray-700 mb-2">Jumlah total kamar</label>
                    <input
                        type="number"
                        id="jumlah_kamar_total"
                        name="jumlah_kamar_total"
                        value="{{ old('jumlah_kamar_total', $kos->jumlah_kamar_total ?? '') }}"
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('jumlah_kamar_total') border-red-500 @enderror"
                        placeholder="Total kamar">
                    @error('jumlah_kamar_total')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="jumlah_kamar_tersedia" class="block text-sm font-medium text-gray-700 mb-2">Jumlah kamar tersedia</label>
                    <input
                        type="number"
                        id="jumlah_kamar_tersedia"
                        name="jumlah_kamar_tersedia"
                        value="{{ old('jumlah_kamar_tersedia', $kos->jumlah_kamar_tersedia ?? '') }}"
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('jumlah_kamar_tersedia') border-red-500 @enderror"
                        placeholder="Kamar tersedia">
                    @error('jumlah_kamar_tersedia')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="jumlah_penghuni_saat_ini" class="block text-sm font-medium text-gray-700 mb-2">Jumlah penghuni saat ini</label>
                    <input
                        type="number"
                        id="jumlah_penghuni_saat_ini"
                        name="jumlah_penghuni_saat_ini"
                        value="{{ old('jumlah_penghuni_saat_ini', $kos->jumlah_penghuni_saat_ini ?? '') }}"
                        class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('jumlah_penghuni_saat_ini') border-red-500 @enderror"
                        placeholder="Jumlah penghuni">
                    @error('jumlah_penghuni_saat_ini')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lokasi di Peta</label>
                <div id="map-picker"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                    {{-- Lintang (Readonly) --}}
                    <div>
                        <input
                            type="text"
                            name="lintang"
                            id="lintang"
                            readonly
                            value="{{ old('lintang', $kos->lintang ?? '') }}"
                            class="w-full px-4 py-2 border rounded-full bg-gray-100 focus:ring-[#704E98] focus:border-[#704E98] @error('lintang') border-red-500 @enderror"
                            placeholder="Lintang (Otomatis)">
                        @error('lintang')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    {{-- Bujur (Readonly) --}}
                    <div>
                        <input
                            type="text"
                            name="bujur"
                            id="bujur"
                            readonly
                            value="{{ old('bujur', $kos->bujur ?? '') }}"
                            class="w-full px-4 py-2 border rounded-full bg-gray-100 focus:ring-[#704E98] focus:border-[#704E98] @error('bujur') border-red-500 @enderror"
                            placeholder="Bujur (Otomatis)">
                        @error('bujur')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Kisaran Harga Sewa per Bulan</label>

                @php
                    $hargaKamar = $kos->harga_kamar ?? (object)['harga_terendah' => null, 'harga_tertinggi' => null];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input
                            type="number"
                            name="harga_terendah"
                            value="{{ old('harga_terendah', $hargaKamar->harga_terendah ?? '') }}"
                            class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('harga_terendah') border-red-500 @enderror"
                            placeholder="Harga Terendah (IDR)">
                        @error('harga_terendah')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <input
                            type="number"
                            name="harga_tertinggi"
                            value="{{ old('harga_tertinggi', $hargaKamar->harga_tertinggi ?? '') }}"
                            class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('harga_tertinggi') border-red-500 @enderror"
                            placeholder="Harga Tertinggi (IDR)">
                        @error('harga_tertinggi')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 mt-4">
                <h3 class="text-lg font-bold text-gray-700 mb-3 border-b pb-2">Fasilitas & Kapasitas</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach ($fasilitas as $f)
                        <div class="flex items-center">
                            @php
                                $fasilitasTerpilih = $kos->fasilitas_terpilih ?? [];
                            @endphp
                            <input
                                type="checkbox"
                                name="fasilitas_ids[]"
                                value="{{ $f->id_fasilitas }}"
                                id="fasilitas_{{ $f->id_fasilitas }}"
                                class="w-4 h-4 text-[#704E98] bg-gray-100 border-gray-300 rounded focus:ring-[#704E98]"
                                {{ in_array($f->id_fasilitas, old('fasilitas_ids', $fasilitasTerpilih)) ? 'checked' : '' }}>
                            <label for="fasilitas_{{ $f->id_fasilitas }}" class="ml-2 text-sm font-medium text-gray-700">
                                {{ $f->nama_fasilitas }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('fasilitas_ids')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('admin.kelola_kos') }}"
                class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
            <button type="submit"
                class="bg-[#704E98] text-white px-6 py-2 rounded-full hover:bg-[#5b3f7a] transition">
                {{ $kos->exists ? 'Perbarui Data' : 'Simpan Data' }}
            </button>
        </div>
    </form>
</div>
@endsection

{{-- SECTION SCRIPTS --}}
@section('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Koordinat default (Tengah Kelurahan Sukorame - Contoh)
            const defaultLat = -7.8184;
            const defaultLng = 112.0195;
            const defaultZoom = 14;

            const latInput = document.getElementById('lintang');
            const lngInput = document.getElementById('bujur');

            // Cek apakah data kos sudah ada (mode edit)
            const initialLat = parseFloat(latInput.value) || defaultLat;
            const initialLng = parseFloat(lngInput.value) || defaultLng;

            // Inisialisasi Peta
            const mymap = L.map('map-picker').setView([initialLat, initialLng], defaultZoom);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            // Inisialisasi Marker
            let marker = L.marker([initialLat, initialLng]).addTo(mymap);

            // Fungsi untuk update input koordinat
            function updateMarker(lat, lng) {
                // Pindahkan marker
                marker.setLatLng([lat, lng]);
                // Update input field
                latInput.value = lat.toFixed(6);
                lngInput.value = lng.toFixed(6);
            }

            // Listener Klik Peta
            mymap.on('click', function(e) {
                updateMarker(e.latlng.lat, e.latlng.lng);
            });

            // Jika form baru, pindahkan marker ke tengah peta saat inisialisasi
            if (!{{ $kos->exists ? 'true' : 'false' }}) {
                 updateMarker(initialLat, initialLng);
            }

            // Memperbaiki rendering peta setelah elemen diukur
            setTimeout(() => {
                mymap.invalidateSize();
            }, 500);
        });
    </script>
@endsection
