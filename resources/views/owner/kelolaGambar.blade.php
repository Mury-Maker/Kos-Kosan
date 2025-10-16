@extends('owner.layouts.app') 

@section('title', 'Kelola Gambar')

@section('content')

{{-- 1. Header Halaman (judul "Data Kelola Gambar") --}}
<div class="flex justify-between items-center mb-6">
    <h3 class="text-xl font-bold text-gray-800">Data Kelola Gambar</h3>
</div>

{{-- 2. Tombol Tambah Gambar (Oval/Pill Shape) --}}
{{-- Menggunakan: rounded-full (oval), warna hijau kustom, dan shadow --}}
<button class="flex items-center px-6 py-2 mb-6 text-white rounded-full shadow-lg hover:brightness-95 transition duration-150"
        style="background-color: #17DD2B; font-size: 1.1rem; font-weight: 600;"> 
    <i class="fas fa-plus mr-3 text-lg"></i>
    Tambah Gambar
</button>

{{-- 3. Tabel Data Gambar --}}
{{-- Menggunakan: shadow-xl (bayangan tebal) dan rounded-lg (sudut membulat) --}}
<div class="relative overflow-x-auto shadow-xl rounded-lg"> 
    <table class="w-full text-base text-left text-gray-800">
        
        {{-- Header Tabel --}}
        <thead class="text-sm uppercase text-white" 
               style="background-color: #5D4B7A;"> {{-- Warna ungu gelap sesuai desain --}}
            <tr>
                <th scope="col" class="px-6 py-3 w-16 font-semibold">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-semibold">
                    Nama Gambar
                </th>
                <th scope="col" class="px-6 py-3 text-right w-36 font-semibold">
                    Aksi
                </th>
            </tr>
        </thead>
        
        {{-- Isi Tabel (Body) --}}
        <tbody>
            
            {{-- Data 1 --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 align-top font-normal text-gray-800 whitespace-nowrap">
                    1
                </td>
                <td class="px-6 py-4 flex items-start space-x-4"> {{-- Gunakan flex untuk menata gambar dan nama file --}}
                    {{-- Preview Gambar --}}
                    <div class="w-24 h-16 flex-shrink-0"> 
                        {{-- Ganti 'path/to/gambar1.jpg' dengan URL gambar yang sebenarnya --}}
                        <img src="{{ asset('path/to/gambar1.jpg') }}" alt="Gambar Kos 1" class="w-full h-full object-cover rounded">
                    </div>
                    {{-- Nama File --}}
                    <span class="pt-1 font-normal text-gray-800">Gambar1.jpg</span>
                </td>
                <td class="px-6 py-4 align-top text-right">
                    {{-- Ikon Edit (Update) - Kuning --}}
                    <a href="#" class="font-medium text-yellow-500 hover:text-yellow-600 ml-3" title="Edit">
                        <i class="fas fa-pen-square text-2xl"></i>
                    </a>
                    {{-- Ikon Delete - Merah --}}
                    <a href="#" class="font-medium text-red-500 hover:text-red-600 ml-2" title="Hapus">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </a>
                </td>
            </tr>

            {{-- Data 2 --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 align-top font-normal text-gray-800 whitespace-nowrap">
                    2
                </td>
                <td class="px-6 py-4 flex items-start space-x-4">
                    <div class="w-24 h-16 flex-shrink-0">
                        {{-- Ganti 'path/to/gambar2.jpg' dengan URL gambar yang sebenarnya --}}
                        <img src="{{ asset('path/to/gambar2.jpg') }}" alt="Gambar Kos 2" class="w-full h-full object-cover rounded">
                    </div>
                    <span class="pt-1 font-normal text-gray-800">Gambar2.jpg</span>
                </td>
                <td class="px-6 py-4 align-top text-right">
                    <a href="#" class="font-medium text-yellow-500 hover:text-yellow-600 ml-3" title="Edit">
                        <i class="fas fa-pen-square text-2xl"></i>
                    </a>
                    <a href="#" class="font-medium text-red-500 hover:text-red-600 ml-2" title="Hapus">
                        <i class="fas fa-trash-alt text-2xl"></i>
                    </a>
                </td>
            </tr>

            {{-- Data 3 --}}
            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50">
                <td class="px-6 py-4 align-top font-normal text-gray-800 whitespace-nowrap">
                    3
                </td>
                <td class="px-6 py-4 flex items-start space-x-4">
                    <div class="w-24 h-16 flex-shrink-0">
                        {{-- Ganti 'path/to/gambar3.jpg' dengan URL gambar yang sebenarnya --}}
                        <img src="{{ asset('path/to/gambar3.jpg') }}" alt="Gambar Kos 3" class="w-full h-full object-cover rounded">
                    </div>
                    <span class="pt-1 font-normal text-gray-800">Gambar3.jpg</span>
                </td>
                <td class="px-6 py-4 align-top text-right">
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

{{-- Pagination --}}
<div class="flex justify-end items-center mt-4 text-sm text-gray-600">
    <button class="px-3 py-1 border rounded-l-md hover:bg-gray-100">&lt;</button>
    <span class="px-3 py-1 border-t border-b bg-gray-50">1</span>
    <span class="px-3 py-1 border-t border-b">dari 1</span>
    <button class="px-3 py-1 border rounded-r-md hover:bg-gray-100">&gt;</button>
</div>

@endsection