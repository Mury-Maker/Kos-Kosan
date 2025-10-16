@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #mapid { height: 480px; width: 100%; border-radius: 0.5rem; }
    </style>
@endsection

@section('content')

{{-- ASUMSI: Controller mengirim $stats dan $kos_terbaru --}}

{{-- Title --}}
<h2 class="text-2xl font-bold mb-6 ml-6">Dashboard</h2>

{{-- card body --}}
<div class="px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        <a href="#"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#1ABC9C]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Pembaruan
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#1ABC9C]">{{ $stats['pembaruan_count'] ?? 0 }}</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#1ABC9C]"></i>
            </div>
        </a>

        <a href="{{ route('admin.kelola_kos') }}"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#FFA700]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Terdaftar
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#FFA700]">{{ $stats['totalKos'] ?? 0 }}</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#FFA700]"></i>
            </div>
        </a>

        <a href="{{ route('admin.kelola_kos') }}?tipe=putra"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#1D91FF]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Laki-laki
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#1D91FF]">{{ $stats['kosPutra'] ?? 0 }}</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#1D91FF]"></i>
            </div>
        </a>

        <a href="{{ route('admin.kelola_kos') }}?tipe=putri"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#F96464]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Perempuan
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#F96464]">{{ $stats['kosPutri'] ?? 0 }}</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#F96464]"></i>
            </div>
        </a>

        <a href="{{ route('admin.kelola_kos') }}?tipe=campuran"
           class="block bg-white rounded-2xl shadow-md p-6 hover:shadow-xl hover:bg-gray-50 transition">
            <h3 class="flex items-center gap-2 text-lg font-semibold text-[#800080]">
                <img src="{{ asset('img/diagram.png') }}" alt="" class="w-5 h-5">
                Kos Bebas
            </h3>
            <div class="flex items-end justify-between mt-3 mb-2">
                <div class="flex items-baseline gap-1 ">
                    <h1 class="text-6xl font-bold text-[#800080]">{{ $stats['kosCampur'] ?? 0 }}</h1>
                    <p class="text-gray-500">data</p>
                </div>
                <i class="fa-solid fa-arrow-up text-[#800080]"></i>
            </div>
        </a>
    </div>
</div>

{{-- data kos (Tabel Ringkasan) --}}
<div class="data-kos mt-6 px-6 py-4 bg-white rounded-2xl shadow-md">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold">Pendataan Kos Terbaru (5 Data)</h3>
        <div class="flex items-center">
            </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse rounded-lg shadow-md overflow-hidden"> {{-- Menambahkan kelas styling tabel --}}
            <thead>
                <tr class="bg-[#704E98] text-white text-left"> {{-- Mengubah warna header --}}
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Kos</th>
                    <th class="px-4 py-3">Alamat Kos</th>
                    <th class="px-4 py-3">Pemilik Kos</th>
                    <th class="px-4 py-3">Nomor Hp</th>
                    <th class="px-4 py-3">Jenis Kos</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($kos_terbaru as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->nama_kos }}</td>
                        <td class="px-4 py-3">{{ $item->alamat_lengkap }}</td>
                        <td class="px-4 py-3">{{ $item->pemilik->nama_pemilik ?? 'N/A' }}</td>
                        <td class="px-4 py-3">{{ $item->pemilik->nomor_telepon ?? 'N/A' }}</td>
                        <td class="px-4 py-3 capitalize">{{ $item->tipe_kos }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">Tidak ada data kos terbaru yang terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- MAP SECTION --}}
<div class="map mt-6 px-6 py-4 bg-white rounded-2xl shadow-md">
    <h3 class="text-lg font-semibold mb-4">Peta Sebaran Kos di Sukorame</h3>
    <div id="mapid"></div> {{-- Wadah Peta --}}
</div>

@endsection


@section('scripts')
    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Data Marker dari Controller
        const kosMarkers = {!! $markers ?? '[]' !!};

        function initMap() {
            const defaultLat = -7.8184;
            const defaultLng = 112.0195;
            const defaultZoom = 14;

            if (!document.getElementById('mapid')) return;

            const mymap = L.map('mapid').setView([defaultLat, defaultLng], defaultZoom);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(mymap);

            const boundsArray = [];

            kosMarkers.forEach(marker => {
                const lat = parseFloat(marker.lat);
                const lng = parseFloat(marker.lng);

                if (isNaN(lat) || isNaN(lng)) return;

                const popupContent = `
                    <strong>${marker.title}</strong><br>
                    Tipe: ${marker.tipe}<br>
                    <small>Lat: ${lat}, Lng: ${lng}</small>
                `;

                L.marker([lat, lng])
                    .addTo(mymap)
                    .bindPopup(popupContent);

                boundsArray.push([lat, lng]);
            });

            if (boundsArray.length > 0) {
                mymap.fitBounds(boundsArray, { padding: [50, 50], maxZoom: defaultZoom });
            } else {
                mymap.setView([defaultLat, defaultLng], defaultZoom);
            }
        }

        document.addEventListener('DOMContentLoaded', initMap);

    </script>
@endsection
