<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Admin & Pemilik Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-[#F8F1FF] min-h-screen flex flex-col items-center justify-center font-sans">

    {{-- Container Utama Login --}}
    <div class="w-[520px] h-[592px] max-w-md my-[76px]">
        <div class="bg-white p-8 rounded-xl shadow-xl border border-gray-200">
            <div class="text-center mb-6">
                <img src="{{ asset('img/logo.svg') }}" alt="Logo Sukorame" class="h-16 w-auto mx-auto mb-8">
                <h2 class="text-3xl font-bold textprim">Masuk Ke Sistem</h2>
                <p class="textsekon text-sm mt-1">Daftarkan kos secara resmi dan dapatkan akun<br>melalui kelurahan</p>
=======
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center font-sans">

    {{-- Container Utama Login --}}
    <div class="w-[520px] h-[592px] max-w-md my-[76px]">
        <div class="bg-white p-8 rounded-xl shadow-2xl border border-gray-200">
            <div class="text-center mb-6">
                <img src="{{ asset('img/logo sukorame berdaya 2025.png') }}" alt="Logo Sukorame" class="h-16 w-auto mx-auto mb-4">
                <h2 class="text-3xl font-bold text-gray-800">Masuk Ke Sistem</h2>
                <p class="text-gray-500 text-sm mt-1">Daftarkan kos secara resmi dan dapatkan akun<br>melalui kelurahan</p>
>>>>>>> 396046c697c41ec3448bc8226db3a027277781cf
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
<<<<<<< HEAD
                    <label for="email" class="block text-sm font-medium textprim mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2 border border-gray-300 rounded-full px-3 py-2 focus:border-[#704E98] focus:ring-[#704E98] focus:ring-0.5 focus:outline-none @error('email') border-red-500 @enderror"
                           placeholder="Masukkan email Anda">
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="block text-sm font-medium textprim mb-2">Kata Sandi</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-full px-3 py-2 focus:border-[#704E98] focus:ring-[#704E98] focus:ring-0.5 focus:outline-none @error('password') border-red-500 @enderror"
                           placeholder="Masukkan kata sandi">
                    <!-- ikon mata -->
                    <button type="button" id="togglePassword" 
                        class="absolute right-4 top-9 text-gray-500 hover:text-[#704E98] focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" id="eyeIcon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.355 4.5 12 4.5c4.646 0 8.578 3.01 9.964 7.183.07.207.07.432 0 .639C20.577 16.49 16.645 19.5 12 19.5c-4.646 0-8.578-3.01-9.964-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
=======
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
>>>>>>> 396046c697c41ec3448bc8226db3a027277781cf
                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-[#704E98] text-white font-semibold py-2.5 rounded-full hover:bg-[#5A3F7A] transition duration-200">
                    Masuk
                </button>

            </form>

<<<<<<< HEAD
            <!-- js mata -->
            <script>
                const togglePassword = document.querySelector("#togglePassword");
                const passwordInput = document.querySelector("#password");
                const eyeIcon = document.querySelector("#eyeIcon");

                togglePassword.addEventListener("click", () => {
                    const isPassword = passwordInput.getAttribute("type") === "password";
                    passwordInput.setAttribute("type", isPassword ? "text" : "password");
                    
                    eyeIcon.innerHTML = isPassword 
                        ? `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223a10.477 10.477 0 00-.939 1.122c-.07.207-.07.432 0 .639C4.423 14.49 8.355 17.5 13 17.5c2.06 0 3.975-.63 5.6-1.68M15 12a3 3 0 01-3 3m-6-6l12 12" />`
                        : `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.355 4.5 12 4.5c4.646 0 8.578 3.01 9.964 7.183.07.207.07.432 0 .639C20.577 16.49 16.645 19.5 12 19.5c-4.646 0-8.578-3.01-9.964-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;
                });
            </script>
            <!-- js mata -->

            <div class="mt-6 text-center text-sm">
                <p class="textsekon">Lupa kata sandi?
=======
            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">Lupa kata sandi?
>>>>>>> 396046c697c41ec3448bc8226db3a027277781cf
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
