@extends('guest.layouts.app')

@section('title', 'Data Kos Resmi Kelurahan Sukorame')

@section('content')

<div class="p-12 mt-8 grid grid-cols-12 gap-6 items-start items-center">
    <div class="col-span-6">
        <div class="wrep w-[560px]">
            <div class="se1judul">Tentang Website ini</div>
            <div class="primjudul textprim">Pendataan Kos Sukorame</div>
            <div class="textsekon">Kelurahan Sukorame merupakan salah satu wilayah dengan jumlah rumah kost yang cukup banyak, terutama karena letaknya yang strategis dan dekat dengan berbagai pusat kegiatan. Kondisi ini menjadikan kebutuhan informasi kos sangat penting, baik bagi warga setempat maupun pendatang.</div>
        </div>
    </div>
    <div class="col-span-6 px-8 ">
        <img src="img/potosuko.svg" alt="sukorame">
    </div>
</div>

<!-- tentang -->
<div class="p-20 mt-20 grid grid-cols-12 gap-6 items-start items-start items-center bgsekon">
    <div class="kanan col-span-6 primjudul primwar flex items-center justify-between">
        <div class="wrep w-[700px] flex items-center">
            <div class="w-[400px] leading-tight">
                Apa Kegunaan Website ini?
            </div>
            <img src="img/panah.svg" alt="">
        </div>
    </div>
    <div class="kiri col-span-6 textsekon">
        Website ini berguna sebagai sarana pendataan rumah kost yang ada di Kelurahan Sukorame. Melalui sistem ini, pihak kelurahan dapat mengelola data kost secara lebih rapi, terpusat, dan resmi. Selain itu, website ini juga bermanfaat bagi masyarakat dan pendatang karena menyediakan informasi kost yang telah terdaftar, lengkap dengan alamat, jumlah kamar, hingga lokasi pada peta. Dengan begitu, website ini tidak hanya mendukung administrasi kelurahan, tetapi juga memudahkan pengunjung dalam menemukan referensi kost yang sesuai dengan kebutuhan mereka.
    </div>
</div>
<!-- tentang -->

<!-- kos -->
<div class="p-12 grid grid-cols-12 gap-6 mt-20">
    <div class="col-span-8">
        <img src="img/kos3.svg" alt="kos3">
    </div>
    <div class="col-span-4">
        <img src="img/kos4.svg" alt="kos.4">
    </div>
</div>
<div class="px-12 grid grid-cols-12 gap-6 items-center">
    <div class="col-span-6">
        <img src="img/kos5.svg" alt="">
    </div>
    <div class="col-span-6">
        <div class="wrep w-[450px]">
            <div class="primjudul textprim">
                Data Kami <span class="primwar">Resmi & Terverifikasi</span>
            </div>
            <div class="textsekon pt-4">
                Seluruh data kost yang ditampilkan dalam sistem ini bersumber langsung dari Kelurahan Sukorame, sehingga terjamin resmi dan telah melalui proses verifikasi.
            </div>
        </div>
    </div>
</div>
<!-- kos -->

<!-- qna -->
<section class="p-12 mt-20 mb-20">
  <div class="grid grid-cols-12 gap-10">
    <!-- Kiri -->
    <div class="col-span-5">
      <h2 class="primjudul textprim">Pertanyaan yang</h2>
      <h2 class="primjudul primwar">Sering Diajukan (FAQ)</h2>
      <p class="textsekon pt-4 leading-relaxed w-[400px]">
        Pertanyaan umum seputar cara kerja sistem dan pendataan kos di Kelurahan Sukorame.
      </p>
    </div>

    <!-- Kanan -->
    <div class="col-span-7 space-y-4">
      <details class="border border-[#E4D9FB] rounded-xl bg-white p-5 open:border-[#A58AF8] open:shadow-md">
        <summary class="flex justify-between items-center cursor-pointer font-semibold textprim">
          Siapa yang bisa mendaftarkan kost di sistem ini?
          <span class="primwar text-2xl">›</span>
        </summary>
        <p class="mt-3 textsekon">
          Hanya pemilik kost di Kelurahan Sukorame yang bisa mendaftarkan melalui kantor kelurahan.
        </p>
      </details>

      <details class="border border-[#E4D9FB] rounded-xl bg-white p-5">
        <summary class="flex justify-between items-center cursor-pointer font-semibold textprim">
          Apakah pendaftaran kost dilakukan langsung di website?
          <span class="primwar text-2xl">›</span>
        </summary>
        <p class="mt-3 textsekon">
          Tidak, pendaftaran awal dilakukan di kantor kelurahan. Setelah terdaftar, pemilik kost akan diberikan akun untuk memperbarui data secara mandiri.
        </p>
      </details>

      <details class="border border-[#E4D9FB] rounded-xl bg-white p-5">
        <summary class="flex justify-between items-center cursor-pointer font-semibold textprim">
          Apa manfaat sistem informasi kost ini bagi masyarakat?
          <span class="primwar text-2xl">›</span>
        </summary>
        <p class="mt-3 textsekon">
          Masyarakat dan pendatang dapat dengan mudah melihat data kost resmi, lengkap dengan alamat, jumlah kamar, dan informasi penting lainnya.
        </p>
      </details>

      <details class="border border-[#E4D9FB] rounded-xl bg-white p-5">
        <summary class="flex justify-between items-center cursor-pointer font-semibold textprim">
          Apakah website ini bisa digunakan untuk memesan kamar kost?
          <span class="primwar text-2xl">›</span>
        </summary>
        <p class="mt-3 textsekon">
          Tidak, website ini hanya menyediakan informasi. Untuk pemesanan atau sewa, silakan hubungi langsung pemilik kost.
        </p>
      </details>

      <details class="border border-[#E4D9FB] rounded-xl bg-white p-5">
        <summary class="flex justify-between items-center cursor-pointer font-semibold textprim">
          Apakah data kost yang ada di sini resmi dan valid?
          <span class="primwar text-2xl">›</span>
        </summary>
        <p class="mt-3 textsekon">
          Ya, semua data kost telah diverifikasi oleh pihak Kelurahan Sukorame.
        </p>
      </details>
    </div>
  </div>
</section>
<!-- qna -->

@endsection
