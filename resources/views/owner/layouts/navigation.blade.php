<!-- Sidebar -->
<aside id="sidebar" class="w-72 h-screen fixed top-0 left-0 transition-all duration-300 z-40 bg-[#704E98] flex flex-col justify-between">
    <!-- Bagian atas: Logo + Menu -->
    <nav class="sidebar-nav p-4">
        <div class="logo flex justify-between items-center mb-4 ml-1 border-b border-white-700 pb-4">
            <!-- Logo di sidebar -->
            <a href="#" class="flex items-center sidebar-logo">
                <img src="{{ asset('img/logoputih.svg') }}" alt="Logo" class="h-12 w-auto">
            </a>
            <!-- Tombol toggle sidebar -->
            <button id="sidebarToggle" class="p-2 text-gray-300 text-2xl rounded-md hover:bg-[#8B70AC]">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('owner.dashboard') }}" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/owner/kelola_Pemilik_Kos" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Kos</span>
                </a>
            </li>
            <li>
                <a href="/owner/kelolaFasilitas" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Fasilitas</span>
                </a>
            </li>
            <li>
                <a href="/owner/kelolaGambar" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Gambar</span>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Bagian bawah: Tombol Logout -->
    <div class="p-4 border-t border-gray-600">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                <i data-feather="log-out" class="w-5 h-5"></i>
                <span class="ml-3 sidebar-text">Logout</span>
            </button>
        </form>
    </div>
</aside>


<!-- Header/Navbar -->
<header id="mainHeader" class="bg-white dark:bg-gray-900 shadow p-4 flex justify-between items-center ml-72 transition-all duration-300 h-[80px]">
    <!-- Kiri: Logo -->
    <div class="flex items-center">
        <a href="#" class="flex items-center header-logo hidden">
            <img src="{{ asset('img/logosuko.svg') }}" alt="Logo" class="h-12 w-auto">
        </a>
    </div>

    <!-- Kanan: Profil -->
    <nav class="navbar-nav flex items-center">
        <div class="relative">
            <!-- Avatar dan Nama -->
            <button id="profileBtn"
                class="flex items-center p-2 gap-3 rounded-full hover:bg-[#8B70AC] dark:hover:bg-[#8B70AC] transition ">
                <img
                    src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.png') }}"
                    alt="User Avatar"
                    class="w-10 h-10 rounded-full border border-gray-300 object-cover shadow-sm">
                <span class="font-semibold text-gray-700 dark:text-gray-200 capitalize">
                    {{ Auth::user()->name ?? 'User' }}
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" id="dropdownIcon" class="w-4 h-4 text-gray-600 dark:text-gray-300 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="profileDropdown"
                 class="absolute right-0 mt-3 w-56 bg-[#704E98] text-white rounded-xl shadow-lg transform scale-95 opacity-0 invisible transition-all duration-200 origin-top-right z-50 border border-[#8B70AC]/40">
                <div class="p-2">
                    <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-[#8B70AC] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white/90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Profil
                    </a>
                    <button onclick="document.getElementById('logout-form').submit();"
                            class="flex items-center gap-2 w-full text-left px-4 py-2 text-red-200 hover:bg-[#8B70AC] rounded-lg transition">
                        <i data-feather="log-out" class="w-5 h-5"></i>
                        Logout
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Script: Toggle Dropdown -->
<script>
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownIcon = document.getElementById('dropdownIcon');

    profileBtn.addEventListener('click', () => {
        const isVisible = profileDropdown.classList.contains('opacity-100');
        profileDropdown.classList.toggle('opacity-100', !isVisible);
        profileDropdown.classList.toggle('visible', !isVisible);
        profileDropdown.classList.toggle('opacity-0', isVisible);
        profileDropdown.classList.toggle('invisible', isVisible);
        profileDropdown.classList.toggle('scale-100', !isVisible);
        profileDropdown.classList.toggle('scale-95', isVisible);
        dropdownIcon.classList.toggle('rotate-180', !isVisible);
    });

    // Klik di luar dropdown untuk menutup
    window.addEventListener('click', (e) => {
        if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            profileDropdown.classList.remove('opacity-100', 'visible', 'scale-100');
            dropdownIcon.classList.remove('rotate-180');
        }
    });
</script>


{{--
<!-- Breadcrumb -->
<nav class="flex ml-72 px-4 py-3 text-gray-600 text-sm bg-gray-50 dark:bg-gray-800 border-b transition-all duration-300" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="{{ route('owner.dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-[#8B70AC]">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L2 8h3v8h10V8h3L10 2z" />
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="w-4 h-4 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7 10l5 5V5l-5 5z" />
                </svg>
                <a href="/owner/kelola_Data_Kos" class="ml-1 text-gray-500 hover:text-[#8B70AC] md:ml-2">Kelola Data Kos</a>
            </div>
        </li>
    </ol>
</nav> --}}
