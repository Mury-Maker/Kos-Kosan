@extends('guest.layouts.app')

@section('title', 'Data Kos Resmi Kelurahan Sukorame')

@section('content')

<div class="p-8 text-center mt-20">
    <h1 class="text-5xl textprim font-bold mb-4">
        Data Kos-Kosan yang telah<br>
        <span class="block mt-8">
            terdaftar di <span class="text-[#704E98]">Kelurahan Sukorame</span>
        </span>
    </h1>
    <p class="text-gray-700 mt-8">Sistem informasi ini memuat hasil pendataan resmi Kelurahan Sukorame untuk memudahkan<br> warga dan pendatang dalam menemukan informasi kost terdaftar</p>
    <div class="justify-center mt-14">
        <a href="#" class="bg-[#704E98] text-white font-medium py-3 px-6 rounded-full ">Lihat Daftar  <img src="img/btnpanah.svg" class="ml-1 w-[14px] inline"></a>
        <a href="#" class="bg-white text-[#704E98] font-medium py-3 px-6 rounded-full border-2 border-[#704E98] ">Tentang Kami <img src="img/tentang.svg" class="ml-1 w-[22px] inline"></a>
    </div>
</div>
<div class="mt-8 px-12 justify-between items-center flex border-y h-[150px] border-gray-300 bg-[#B592D2] text-white">
    <p>Cek dan daftarkan Kos secara <br>
        resmi ke Kelurahan Sukorame</p>
    <div class="flex justify-center items-center text-center flex text-white gap-16">
        <div>
            <div class="text-4xl font-bold">10+</div>
            <div class="text-sm">Kos Terdaftar</div>
        </div>
        <div>
            <div class="text-4xl font-bold">15+</div>
            <div class="text-sm">Kos Perempuan</div>
        </div>
        <div>
            <div class="text-4xl font-bold">16+</div>
            <div class="text-sm">Kos Laki-laki</div>
        </div>
        <div>
            <div class="text-4xl font-bold">5+</div>
            <div class="text-sm">Kos Bebas</div>
        </div>
    </div>
    <img src="img/logoputih.svg" class="h-12 w-auto">
</div>

<div class="px-12 py-20 grid grid-cols-12 gap-6 items-start bg-[#F8F1FF]">
    <div class="col-span-6">
        <div class="font-semibold">
            <div class="text-4xl textprim">
                Lihat semua Kos-kosan yang aktif di
                <span class="text-5xl text-[#704E98]">Kelurahan Sukorame</span>
            </div>
        </div>
        <a href="#"
           class="mt-6 inline-flex items-center text-[#704E98] border border-[#704E98] font-medium py-2 px-5 rounded-full hover:bg-[#704E98] hover:text-white transition">
            Lihat Selengkapnya
            <span class="ml-2">→</span>
        </a>
    </div>

    <div class="col-span-3 bg-white rounded-2xl shadow overflow-hidden">
        <img src="img/kos1.svg" class="w-full h-40 object-cover rounded-t-2xl" alt="">
        <div class="p-3">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-xl">Kos Bu Rahmat</h3>
                <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full">Kos Perempuan</span>
            </div>
            <p class="text-sm text-gray-500 flex items-center">
                <i class="fas fa-map-marker-alt mr-1 text-[#704E98]"></i> Jln. Sukorame...
            </p>
        </div>
    </div>

    <div class="col-span-3 bg-white rounded-2xl shadow overflow-hidden">
        <img src="img/kos1.svg" class="w-full h-40 object-cover rounded-t-2xl" alt="">
        <div class="p-3">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-semibold text-xl">Nama kos</h3>
                <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">Kos Laki-Laki</span>
            </div>
            <p class="text-sm text-gray-500 flex items-center">
                <i class="fas fa-map-marker-alt mr-1 text-[#704E98]"></i> Jln. Sukorame...
            </p>
        </div>
    </div>
</div>

<!-- lokasi -->
<div class="px-12 mt-20 py-12 grid grid-cols-12 gap-6 items-start items-center">
    <div class="col-span-6">
        <img src="img/lokasi.svg" alt="Lokasi" class="h-auto w-auto">
    </div>
    <div class="col-span-6 px-8 ">
        <h3 class="font-semibold text-5xl text-[#444444] pb-6">Kos tersebar di Kelurahan Sukorame</h3>
        <p class="textsekon w-[500px]">Sistem informasi ini menampilkan lokasi kost di Kelurahan Sukarame untuk membantu pendataan resmi sekaligus memudahkan masyarakat dan pendatang memperoleh informasi kos terdaftar.</p>
        <a href="#"
           class="mt-6 inline-flex items-center text-[#704E98] border border-[#704E98] font-medium py-2 px-5 rounded-full hover:bg-[#704E98] hover:text-white transition">
            Cek Lokasi
            <span class="ml-2">→</span>
        </a>
    </div>
</div>
<!-- lokasi -->

<!-- kelebihan -->
<div class="px-12 mt-20 mb-20">
    <div class="text-5xl primwar font-semibold text-center">Kelebihan <span class="textprim">Sistem</span></div>
    <div class="bg-[#F8F1FF] mt-8 p-16 rounded-2xl text-[#444444]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="flex items-start gap-3">
                    <img src="img/cari.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Mencari data</h3>
                        <p>Melihat daftar kos resmi yang telah terdaftar di Kelurahan Sukorame.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <img src="img/loca.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Lokasi Kos</h3>
                        <p>Mengecek lokasi kos di peta, sehingga lebih mudah menentukan area yang diinginkan.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <img src="img/koin.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Tau Harga</h3>
                        <p>Mengetahui informasi harga sewa, sehingga bisa memperkirakan pilihan sesuai kebutuhan.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-start gap-3">
                    <img src="img/bagud.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Terpercaya</h3>
                        <p>Informasi terpercaya, karena data bersumber langsung dari Kelurahan Sukorame.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <img src="img/jam.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Hemat Waktu & Tenaga</h3>
                        <p>Cukup mengecek lewat website tanpa harus mendatangi kos satu per satu.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <img src="img/catat.svg" alt="">
                    <div>
                        <h3 class="font-semibold text-[#704E98]">Referensi</h3>
                        <p>Sebagai referensi sebelum memutuskan kos yang ingin dikunjungi secara langsung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
