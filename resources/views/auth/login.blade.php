<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Admin & Pemilik Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center font-sans">

    {{-- Container Utama Login --}}
    <div class="w-[520px] h-[592px] max-w-md my-[76px]">
        <div class="bg-white p-8 rounded-xl shadow-2xl border border-gray-200">
            <div class="text-center mb-6">
                <img src="{{ asset('img/logo sukorame berdaya 2025.png') }}" alt="Logo Sukorame" class="h-16 w-auto mx-auto mb-4">
                <h2 class="text-3xl font-bold text-gray-800">Masuk Ke Sistem</h2>
                <p class="text-gray-500 text-sm mt-1">Daftarkan kos secara resmi dan dapatkan akun<br>melalui kelurahan</p>
            </div>

            {{-- Pesan Error Validasi Global --}}
            @error('email')
                <div class="p-3 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('email') border-red-500 @enderror"
                           placeholder="Masukkan email Anda">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                    <input type="password" id="password" name="password" required
                           {{-- PERBAIKAN: Menambahkan error styling untuk kolom password --}}
                           class="w-full px-4 py-2 border rounded-full focus:ring-[#704E98] focus:border-[#704E98] @error('password') border-red-500 @enderror"
                           placeholder="Masukkan kata sandi">
                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-[#704E98] text-white font-semibold py-2.5 rounded-full hover:bg-[#5A3F7A] transition duration-200">
                    Masuk
                </button>

            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">Lupa kata sandi?
                    <a href="#" class="text-[#704E98] hover:underline">Reset di sini</a>
                </p>
            </div>
        </div>
        {{-- PERBAIKAN: Footer diletakkan di dalam body dan diberi styling --}}
        <footer class="mt-8 mb-4 text-center text-[#555555] text-xs w-full">
            <p>© 2025 Kelurahan Sukorame. Sistem Informasi Pendataan Kos</p>
        </footer>
    </div>

</body>
</html>
