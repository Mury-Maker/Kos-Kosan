<nav class="bg-[#FFFCFC] px-8 h-20 flex justify-between items-center shadow-md">
    <div class="flex items-center">
        <a href="{{ route('landingPage') }}">
            <img src="{{ asset('img/logosuko.svg') }}" alt="Logo" class="h-12 w-auto">
        </a>
    </div>

    <ul class="flex list-none m-0 p-0">
        <li class="ml-8">
            <a href="{{ route('landingPage') }}"
               class="font-medium pb-0.5 border-b-2 transition-colors duration-300
                    {{ Route::is('landingPage') ? 'text-[#704E98] border-[#704E98]' : 'text-gray-500 hover:text-[#704E98] border-transparent' }}">
                Beranda
            </a>
        </li>

        <li class="ml-8">
            <a href="{{ route('daftarKos') }}"
               class="font-medium pb-0.5 border-b-2 transition-colors duration-300
                    {{ Route::is('daftarKos') ? 'text-[#704E98] border-[#704E98]' : 'text-gray-500 hover:text-[#704E98] border-transparent' }}">
                Daftar Kos Aktif
            </a>
        </li>

        <li class="ml-8">
            <a href="{{ route('tentang') }}"
               class="font-medium pb-0.5 border-b-2 transition-colors duration-300
                    {{ Route::is('tentang') ? 'text-[#704E98] border-[#704E98]' : 'text-gray-500 hover:text-[#704E98] border-transparent' }}">
                Tentang
            </a>
        </li>
    </ul>

    <a href="{{ route('login') }}"
       class="font-medium py-3 px-6 rounded-full transition-colors duration-300 bg-[#704E98] text-white hover:bg-[#512D84]">
        Login
    </a>
</nav>
