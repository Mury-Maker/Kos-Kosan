@extends('owner.layouts.app') 

@section('title', 'Kelola Fasilitas')

@section('content')

{{-- 1. Header Halaman (judul "Data Kelola Fasilitas") --}}
<div class="flex justify-between items-center mb-6">
    {{-- Menggunakan ukuran font dan warna teks yang standar --}}
    <h3 class="text-xl font-bold text-gray-800">Data Kelola Fasilitas</h3>
</div>

{{-- 2. Tombol Tambah Fasilitas (Oval/Pill Shape) --}}
{{-- Menggunakan: rounded-full (oval), warna hijau kustom, dan shadow --}}
<button class="flex items-center px-6 py-2 mb-6 text-white rounded-full shadow-lg hover:brightness-95 transition duration-150"
        style="background-color: #17DD2B; font-size: 1.1rem; font-weight: 600;"> 
    <i class="fas fa-plus mr-3 text-lg"></i> {{-- Ukuran ikon sedikit lebih besar --}}
    Tambah Fasilitas
</button>

{{-- 3. Tabel Data Fasilitas --}}
{{-- Menggunakan: shadow-xl (bayangan lebih tebal) dan rounded-lg (sudut membulat) --}}
<div class="relative overflow-x-auto shadow-xl rounded-lg"> 
    <table class="w-full text-base text-left text-gray-800"> {{-- Ukuran font isi tabel sedikit diperbesar --}}
        
        {{-- Header Tabel --}}
        <thead class="text-sm uppercase text-white" 
               style="background-color: #5D4B7A;"> {{-- Warna ungu gelap sesuai gambar --}}
            <tr>
                <th scope="col" class="px-6 py-3 w-16 font-semibold"> {{-- Font lebih tebal --}}
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-semibold"> {{-- Font lebih tebal --}}
                    Nama Fasilitas
                </th>
                <th scope="col" class="px-6 py-3 text-right w-36 font-semibold"> {{-- 'Aksi' rata kanan --}}
                    Aksi
                </th>
            </tr>
        </thead>
        
        {{-- Isi Tabel (Body) --}}
        <tbody>
            {{-- Data 1: Kasur --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 font-normal text-gray-800 whitespace-nowrap">
                    1
                </td>
                <td class="px-6 py-4 font-normal text-gray-800">
                    Kasur
                </td>
                <td class="px-6 py-4 text-right"> {{-- Ikon rata kanan --}}
                    {{-- Ikon Edit (Update) - Warna kuning cerah, ikon besar --}}
                    <a href="#" class="font-medium text-yellow-500 hover:text-yellow-600 ml-3" title="Edit">
                        <i class="fas fa-pen-square text-2xl"></i> {{-- Ukuran ikon sangat besar --}}
                    </a>
                    {{-- Ikon Delete - Warna merah cerah, ikon besar --}}
                    <a href="#" class="font-medium text-red-500 hover:text-red-600 ml-2" title="Hapus">
                        <i class="fas fa-trash-alt text-2xl"></i> {{-- Ukuran ikon sangat besar --}}
                    </a>
                </td>
            </tr>

            {{-- Data 2: Kipas --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 font-normal text-gray-800 whitespace-nowrap">
                    2
                </td>
                <td class="px-6 py-4 font-normal text-gray-800">
                    Kipas
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-yellow-500 hover:text-yellow-600 ml-3" title="Edit">
                        <i class="fas fa-pen-square text-2xl"></i>
                    </a>
                    <a href="#" class="font-medium text-red-500 hover:text-red-600 ml-2" title="Hapus">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </a>
                </td>
            </tr>

            {{-- Data 3: Almari --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 font-normal text-gray-800 whitespace-nowrap">
                    3
                </td>
                <td class="px-6 py-4 font-normal text-gray-800">
                    Almari
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-yellow-500 hover:text-yellow-600 ml-3" title="Edit">
                        <i class="fas fa-pen-square text-2xl"></i>
                    </a>
                    <a href="#" class="font-medium text-red-500 hover:text-red-600 ml-2" title="Hapus">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

{{-- Floating Action Button 'Q' dihilangkan karena tidak ada di gambar terbaru --}}

@endsection