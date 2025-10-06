<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilah Navigasi Kustom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-[#FFFCFC] font-sans m-0">

<nav class="bg-[#FFFCFC] px-8 h-20 flex justify-between items-center shadow-md">
    <div class="flex items-center">
        <img src="img/logosuko.svg" alt="Logo" class="h-12 w-auto">
    </div>

    <ul class="flex list-none m-0 p-0">
        <li class="ml-8">
            <a href="#" class="text-blue-700 font-medium pb-0.5 border-b-2 border-blue-700 transition-colors duration-300">Beranda</a>
        </li>
        <li class="ml-8">
            <a href="#" class="text-gray-500 hover:text-blue-700 font-medium transition-colors duration-300">Tentang</a>
        </li>
        <li class="ml-8">
            <a href="#" class="text-gray-500 hover:text-blue-700 font-medium transition-colors duration-300">Daftar Kos Aktif</a>
        </li>
        <li class="ml-8">
            <a href="#" class="text-gray-500 hover:text-blue-700 font-medium transition-colors duration-300">Kontak</a>
        </li>
    </ul>

    <a href="{{ route('login') }}" class="bg-[#704E98] text-white font-medium py-3 px-6 rounded-full">Masuk Admin</a>
</nav>

<div class="p-8 text-center mt-20">
    <h1 class="text-5xl font-bold mb-4 textprim">
        Data Kos-Kosan yang telah<br>
        <span class="block mt-8">
            terdaftar di <span class="text-[#704E98]">Kelurahan Sukorame</span>
        </span>
    </h1>
    <p class="text-gray-700 mt-8">Sistem informasi ini memuat hasil pendataan resmi Kelurahan Sukorame untuk memudahkan<br> warga dan pendatang dalam menemukan informasi kost terdaftar</p>
    <div class="justify-center mt-14">
            <a href="#" class="bg-[#704E98] text-white font-medium py-3 px-6 rounded-full ">Lihat Daftar  <img src="img/btnpanah.svg" class="ml-1 w-[14px] inline"></a>
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

<!-- kos -->
<div class="p-8 py-12 grid grid-cols-12 gap-6 items-start bg-[#F8F1FF]">
  
  <!-- kiri -->
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

  <!-- kanan 1 -->
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

  <!-- kanan 2 -->
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
<!-- kos -->


<!-- lokasi -->
<div class="p-8 px-12 my-8 py-12 grid grid-cols-12 gap-6 items-start items-center">
  <div class="col-span-6">
    <img src="img/lokasi.svg" alt="Lokasi" class="h-auto w-auto">
  </div>
  <div class="col-span-6 px-8 ">
    <h3 class="font-semibold text-5xl text-[#444444] pb-6">Kos tersebar di Kelurahan Sukorame</h3>
    <p class="text-[#555555]">Sistem informasi ini menampilkan lokasi kost di Kelurahan Sukarame untuk membantu pendataan resmi sekaligus memudahkan masyarakat dan pendatang memperoleh informasi kos terdaftar.</p>
    <a href="#"
       class="mt-6 inline-flex items-center text-[#704E98] border border-[#704E98] font-medium py-2 px-5 rounded-full hover:bg-[#704E98] hover:text-white transition">
      Cek Lokasi 
      <span class="ml-2">→</span>
    </a> 
  </div>
</div>
<!-- lokasi -->

<!-- ke;ebihan -->
<div class="p-8 my-8 px-12 py-12">
  <div class="text-5xl primwar font-semibold text-center">Kelebihan <span class="textprim">Sistem</span></div> 
  <!-- kelebihan -->
  <div class="bg-[#F8F1FF] mt-8 p-16 rounded-2xl text-[#444444]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- kolom kiri -->
      <div class="space-y-6">
        <!-- item 1 -->
        <div class="flex items-start gap-3">
          <img src="img/cari.svg" alt="">
          <div>
            <h3 class="font-semibold text-[#704E98]">Mencari data</h3>
            <p>Melihat daftar kos resmi yang telah terdaftar di Kelurahan Sukorame.</p>
          </div>
        </div>

        <!-- item 2 -->
        <div class="flex items-start gap-3">
          <img src="img/loca.svg" alt="">
          <div>
            <h3 class="font-semibold text-[#704E98]">Lokasi Kos</h3>
            <p>Mengecek lokasi kos di peta, sehingga lebih mudah menentukan area yang diinginkan.</p>
          </div>
        </div>

        <!-- item 3 -->
        <div class="flex items-start gap-3">
          <img src="img/koin.svg" alt="">
          <div>
            <h3 class="font-semibold text-[#704E98]">Tau Harga</h3>
            <p>Mengetahui informasi harga sewa, sehingga bisa memperkirakan pilihan sesuai kebutuhan.</p>
          </div>
        </div>
      </div>

      <!-- kolom kanan -->
      <div class="space-y-6">
        <!-- item 4 -->
        <div class="flex items-start gap-3">
          <img src="img/bagud.svg" alt="">
          <div>
            <h3 class="font-semibold text-[#704E98]">Terpercaya</h3>
            <p>Informasi terpercaya, karena data bersumber langsung dari Kelurahan Sukorame.</p>
          </div>
        </div>

        <!-- item 5 -->
        <div class="flex items-start gap-3">
          <img src="img/jam.svg" alt="">
          <div>
            <h3 class="font-semibold text-[#704E98]">Hemat Waktu & Tenaga</h3>
            <p>Cukup mengecek lewat website tanpa harus mendatangi kos satu per satu.</p>
          </div>
        </div>

        <!-- item 6 -->
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
  <!-- kelebihan -->

</div>
<!-- kelebihan -->


<!-- footer -->
<footer class="p-8 bg-[#704E98] text-white px-12 py-10">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
    <!-- logo -->
    <div>
      <img src="img/logoputih.svg" alt="Sukorame Berdaya" class="h-16 mb-4">
    </div>

    <!-- kontak kelurahan -->
    <div>
      <h3 class="font-semibold text-lg mb-3">Kontak Kelurahan</h3>
      <p>Kelurahan Mojoroto<br>
        Kecamatan Mojoroto, Kota Kediri<br>
        6022152<br>
        kelurahan.sukorame@gmail.com
      </p>
    </div>

    <!-- sosial media + lokasi -->
    <div class="flex flex-col md:flex-row md:justify-between gap-6">
      <!-- sosial media -->
      <div>
        <h3 class="font-semibold text-lg mb-3">Sosial Media</h3>
        <div class="flex items-center gap-2">
          <img src="img/ig.svg" alt="Instagram" class="h-5 w-5">
          <span>@kelurahan.sukorame</span>
        </div>
      </div>

      <!-- lokasi -->
      <div>
        <h3 class="font-semibold text-lg mb-3">Lokasi</h3>
        <img src="" alt="Peta Lokasi" class="w-32 h-32 object-cover rounded-md">
      </div>
    </div>
  </div>

  <hr class="border-white/30 my-8">

  <p class="text-center text-sm">
    © 2025 Kelurahan Sukorame. Sistem Informasi Pendataan Kos
  </p>
</footer>
<!-- footer -->

</body>
</html>
