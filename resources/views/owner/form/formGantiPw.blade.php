@extends('owner.layouts.app')

@section('title', 'Ubah Kata Sandi')

@section('content')

<div class="px-6 py-8">
    <div class="bg-white p-8 rounded-xl shadow-lg mb-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-extrabold text-gray-800 mb-6">Ubah Kata Sandi Akun</h2>

        @if (session('success'))
            <div class="p-3 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Logika untuk menampilkan error validasi setelah submit --}}
        @if ($errors->any())
             <div class="p-3 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                Pastikan Anda memasukkan kata sandi lama yang benar dan kata sandi baru sesuai aturan.
            </div>
        @endif

        <form method="POST" action="{{ route('owner.password.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi Lama</label>
                <input type="password" id="current_password" name="current_password" required
                       class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('current_password') border-red-500 @enderror">
                @error('current_password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi Baru</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('password') border-red-500 @enderror">
                @error('password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Kata Sandi Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded-full">
            </div>

            <div class="flex justify-between space-x-3 pt-4">
                <a href="{{ route('owner.profile') }}"
                   class="bg-gray-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-gray-600 transition">
                   <i class="fas fa-arrow-left mr-1"></i> Kembali ke Profil
                </a>
                <button type="submit"
                        class="bg-red-500 text-white font-semibold py-2 px-6 rounded-full shadow-md hover:bg-red-600 transition duration-200">
                    Simpan Kata Sandi
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
