<footer class="p-8 bg-[#704E98] text-white px-12 py-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 items-start">
        <!-- Logo -->
        <div class="col-span-1">
            <img src="img/logoputih.svg" alt="Sukorame Berdaya" class="h-16 mb-4">
        </div>

        <!-- Kontak -->
        <div class="col-span-1">
            <h3 class="font-semibold text-lg mb-3">Kontak Kelurahan</h3>
            <p>Kelurahan Mojoroto<br>
                Kecamatan Mojoroto, Kota Kediri<br>
                6022152<br>
                kelurahan.sukorame@gmail.com
            </p>
        </div>

        <!-- Sosial Media -->
        <div class="col-span-1">
            <h3 class="font-semibold text-lg mb-3">Sosial Media</h3>
            <div class="flex items-center gap-2">
                <img src="img/ig.svg" alt="Instagram" class="h-5 w-5">
                <span>@kelurahan.sukorame</span>
            </div>
        </div>

        <!-- Map -->
        <div class="col-span-1">
            <h3 class="font-semibold text-lg mb-3">Lokasi</h3>
            {{-- Div untuk Peta, menggunakan class lebar & tinggi asli (w-48 h-48) --}}
            <div id="map-footer" class="w-64 h-48 rounded-md"></div>
        </div>
    </div>

    <hr class="border-white/30 my-8">
    <p class="text-center text-sm">
        © 2025 Kelurahan Sukorame. Sistem Informasi Pendataan Kos
    </p>

    {{-- SCRIPT INISIALISASI PETA FOOTER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sukorameLat = -7.8054208;
            const sukorameLng = 111.9805677;


            // Cek apakah Leaflet sudah dimuat dan elemen peta ada
            if (document.getElementById('map-footer') && typeof L !== 'undefined') {
                const mapFooter = L.map('map-footer', {
                    // Mengaktifkan kembali kontrol zoom dan interaksi
                    zoomControl: true,
                    scrollWheelZoom: true,
                    dragging: true,
                    tap: true
                }).setView([sukorameLat, sukorameLng], 14);

                // Tambahkan layer OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors',
                    maxZoom: 18,
                    minZoom: 12,
                }).addTo(mapFooter);

                // TAMBAHKAN GARIS BATAS (POLIGON PERKIRAAN)
                L.polygon(boundaryCoords, {
                    color: '#704E98',        // Warna Ungu
                    weight: 3,               // Ketebalan Garis
                    fillColor: '#704E98',    // Warna Isi Poligon
                }).addTo(mapFooter)
                  .bindPopup("Area Kelurahan Sukorame (Perkiraan)");

                // Atur zoom agar sesuai dengan batas poligon
                mapFooter.fitBounds(boundaryCoords);

                // Memperbaiki rendering peta setelah elemen diukur
                setTimeout(function() {
                    mapFooter.invalidateSize();
                }, 100);
            }
        });
    </script>
</footer>
