@extends('owner.layouts.app')

@section('title', 'Edit Profil Saya')

@section('content')

<div class="px-6 py-8">
    <div class="bg-white p-8 rounded-xl shadow-lg mb-8 max-w-2xl mx-auto">
        <h2 class="text-2xl font-extrabold text-gray-800 mb-6">Ubah Data Pribadi</h2>

        {{-- Route updateProfile menangani upload file --}}
        <form method="POST" action="{{ route('owner.profile.update', $pemilikData->id_pemilik) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FOTO PROFIL --}}
            <div class="mb-6 border-b border-gray-100 pb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    {{-- Avatar saat ini --}}
                    <img
                        src="{{ asset('storage/' . $pemilikData->foto_profil) }}"
                        onerror="this.onerror=null; this.src='{{ asset('img/default-avatar.png') }}';"
                        alt="Foto Profil Saat Ini"
                        class="w-20 h-20 rounded-full object-cover border-4 border-gray-300 shadow-sm">

                    {{-- Input File --}}
                    <input type="file" name="foto_profil"
                        class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#8B70AC] file:text-white hover:file:bg-[#704E98] @error('foto_profil') border-red-500 @enderror">
                </div>
                @error('foto_profil')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>


            <div class="mb-4">
                <label for="nama_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemilik Kos</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" required
                       value="{{ old('nama_pemilik', $pemilikData->nama_pemilik) }}"
                       class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nama_pemilik') border-red-500 @enderror">
                @error('nama_pemilik')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="alamat_pemilik" class="block text-sm font-medium text-gray-700 mb-2">Alamat Pemilik Kos</label>
                <input type="text" id="alamat_pemilik" name="alamat_pemilik" required
                       value="{{ old('alamat_pemilik', $pemilikData->alamat_pemilik) }}"
                       class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('alamat_pemilik') border-red-500 @enderror">
                @error('alamat_pemilik')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" required
                       value="{{ old('nomor_telepon', $pemilikData->nomor_telepon) }}"
                       class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('nomor_telepon') border-red-500 @enderror">
                @error('nomor_telepon')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('owner.profile') }}"
                   class="bg-gray-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-gray-600 transition">
                   <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit"
                    class="bg-orange-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:bg-orange-600 transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
