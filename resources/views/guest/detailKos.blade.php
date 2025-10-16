@extends('guest.layouts.app')

@section('title', 'Detail Kos ' . $kos->nama_kos)

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map-lokasi { height: 350px; width: 100%; border-radius: 0.5rem; }
        /* Tambahan style khusus untuk meniru tag harga */
        .tag-tipe { background-color: #F3E8FF; color: #704E98; padding: 0.25rem 0.75rem; border-radius: 9999px; font-weight: 500; font-size: 0.875rem; }
    </style>
@endsection

@section('content')

<div class="px-12 py-8">
    <div class="bg-white rounded-2xl shadow-xl p-6">

        <div class="grid grid-cols-2 gap-4 mb-8">
            {{-- Foto Utama (Asumsi gambar pertama) --}}
            <div class="col-span-1">
                <img src="{{ asset($kos->gambar->first()->url_gambar ?? 'img/kos_default.svg') }}"
                     alt="Foto Utama Kos" class="w-full h-96 object-cover rounded-xl shadow-lg">
            </div>

            {{-- Galeri Kecil --}}
            <div class="col-span-1 grid grid-cols-2 grid-rows-2 gap-3">
                @forelse ($kos->gambar->skip(1)->take(3) as $gambar)
                    <img src="{{ asset($gambar->url_gambar) }}" alt="Foto Kos" class="w-full h-full object-cover rounded-lg shadow">
                @empty
                    <div class="bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">Foto Tidak Tersedia</div>
                @endforelse

                <div class="bg-gray-100 rounded-lg flex items-center justify-center text-sm text-gray-700">
                    <a href="#">Lihat Semua Foto ({{ $kos->gambar->count() }})</a>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-1">{{ $kos->nama_kos }}</h1>
                <div class="flex items-center space-x-3 mt-2">
                    <span class="tag-tipe capitalize">{{ $kos->tipe_kos }}</span>
                    <span class="text-gray-600"><i class="fas fa-bed mr-1"></i> {{ $kos->jumlah_kamar_total }} Kamar</span>
                    <span class="text-gray-600"><i class="fas fa-door-open mr-1"></i> {{ $kos->jumlah_kamar_tersedia }} Kamar Kosong</span>
                </div>
            </div>

            <div class="text-right">
                <p class="text-xl font-semibold text-gray-500">IDR {{ number_format($hargaKamar->harga_terendah, 0, ',', '.') }} - {{ number_format($hargaKamar->harga_tertinggi, 0, ',', '.') }} /bulan</p>
                <a href="https://wa.me/{{ $kos->pemilik->nomor_telepon ?? '' }}" target="_blank"
                   class="bg-[#704E98] text-white px-6 py-2 rounded-full mt-3 inline-block hover:bg-[#5A3F7A] transition">
                    Hubungi Pemilik
                </a>
            </div>
        </div>

        <div class="mt-8">
            <div class="border-b border-gray-200">
                <ul class="flex -mb-px text-sm font-medium text-center text-gray-500">
                    <li class="mr-2"><a href="#umum" class="inline-block p-4 border-b-2 border-[#704E98] text-[#704E98]">Info Umum</a></li>
                    <li class="mr-2"><a href="#fasilitas" class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Fasilitas</a></li>
                    <li class="mr-2"><a href="#lokasi" class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Lokasi</a></li>
                </ul>
            </div>

            <div id="umum" class="py-6">
                <h3 class="text-2xl font-bold mb-4">Keunggulan Kos Ini</h3>
                <p class="text-gray-700 mb-6">{{ $kos->deskripsi_kos ?? 'Deskripsi belum tersedia.' }}</p>

                <h3 class="text-2xl font-bold mb-4">Fasilitas Utama & Umum</h3>
                <div class="grid grid-cols-3 gap-4">
                    @forelse ($kos->fasilitas as $f)
                        <div class="flex items-center space-x-2 text-gray-700">
                            <i class="fas fa-check text-green-500"></i>
                            <span>{{ $f->nama_fasilitas }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 italic">Tidak ada daftar fasilitas yang terhubung.</p>
                    @endforelse
                </div>
            </div>

            <div id="lokasi" class="py-6">
                <h3 class="text-2xl font-bold mb-4">Lokasi Kos</h3>
                <div id="map-lokasi"></div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lat = {{ $kos->lintang ?? 'null' }};
            const lng = {{ $kos->bujur ?? 'null' }};
            const kosName = "{{ $kos->nama_kos }}";
            const defaultLat = -7.8184; // Contoh tengah Sukorame
            const defaultLng = 112.0195;

            // Cek jika koordinat tersedia, jika tidak gunakan default
            const initialLat = lat || defaultLat;
            const initialLng = lng || defaultLng;
            const initialZoom = (lat && lng) ? 16 : 14;

            if (document.getElementById('map-lokasi')) {
                const map = L.map('map-lokasi').setView([initialLat, initialLng], initialZoom);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                }).addTo(map);

                if (lat && lng) {
                    L.marker([lat, lng])
                        .addTo(map)
                        .bindPopup(`<strong>${kosName}</strong>`)
                        .openPopup();
                } else {
                    L.marker([initialLat, initialLng])
                        .addTo(map)
                        .bindPopup("Lokasi Perkiraan (Koordinat Kosong)")
                        .openPopup();
                }
            }
        });
    </script>
@endsection
