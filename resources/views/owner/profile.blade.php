@extends('owner.layouts.app')

@section('title', 'Profil Pemilik Kos')

@section('content')

{{-- ASUMSI: $pemilikData dan $userData dikirim dari OwnerController@showProfile --}}

<div class="px-6 py-8">

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- BAGIAN 1: PROFIL PRIBADI (Tabel_Pemilik) --}}
    <div class="bg-white p-8 rounded-xl shadow-lg mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Profil</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

            {{-- Foto Profil --}}
            <div class="col-span-1 flex justify-center">
                <img
                    src="{{ asset('storage/' . $pemilikData->foto_profil) }}"
                    onerror="this.onerror=null; this.src='{{ asset('img/default-avatar.png') }}';"
                    alt="Foto Profil"
                    class="w-36 h-36 rounded-full object-cover border-4 border-gray-100 shadow-md">
            </div>

            {{-- Detail Info --}}
            <div class="md:col-span-2 space-y-4">
                <div class="grid grid-cols-2">
                    <span class="text-gray-500 font-medium">Nama Pemilik Kos</span>
                    <span class="font-semibold text-gray-800">{{ $pemilikData->nama_pemilik }}</span>
                </div>
                <div class="grid grid-cols-2">
                    <span class="text-gray-500 font-medium">Alamat Pemilik Kos</span>
                    <span class="text-gray-800">{{ $pemilikData->alamat_pemilik }}</span>
                </div>
                <div class="grid grid-cols-2">
                    <span class="text-gray-500 font-medium">Nomor Telp</span>
                    <span class="text-gray-800">{{ $pemilikData->nomor_telepon }}</span>
                </div>
                {{-- Alamat Email Kontak (Dari tabel users) --}}
                <div class="grid grid-cols-2">
                    <span class="text-gray-500 font-medium">Alamat Email</span>
                    <span class="text-gray-800">{{ $userData->email }}</span>
                </div>
            </div>

            {{-- Tombol Edit --}}
            <div class="md:col-span-3 flex justify-end">
                <a href="{{ route('owner.profile.edit', $pemilikData->id_pemilik) }}"
                   class="bg-orange-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:bg-orange-600 transition duration-200">
                    Ubah Profil
                </a>
            </div>

        </div>
    </div>

    {{-- BAGIAN 2: AKUN MASUK SISTEM (Tabel Users) --}}
    <div class="bg-white p-8 rounded-xl shadow-lg mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Akun Masuk Sistem</h2>

        <div class="space-y-4">
            <div class="grid grid-cols-3 md:grid-cols-4 items-center">
                <span class="text-gray-500 font-medium col-span-1">Alamat Email</span>
                <span class="font-semibold text-gray-800 col-span-2">{{ $userData->email }}</span>
            </div>

            <div class="grid grid-cols-3 md:grid-cols-4 items-center">
                <span class="text-gray-500 font-medium col-span-1">Kata Sandi</span>
                {{-- LINK KE HALAMAN GANTI PASSWORD --}}
                <a href="{{ route('owner.password.form') }}"
                        class="bg-red-500 text-white font-medium py-2 px-4 rounded-full shadow-md hover:bg-red-600 transition duration-200 col-span-2 md:col-span-1 text-sm text-center">
                    Ubah Kata Sandi
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
