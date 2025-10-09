<!-- Sidebar -->
<aside id="sidebar" class="w-72  h-screen fixed top-0 left-0 transition-all duration-300 z-40">
    <nav class="sidebar-nav p-4">
        <div class="logo flex justify-between items-center mb-4 ml-1 border-b border-white-700 pb-4">
            <!-- Logo di sidebar -->
            <a href="#" class="flex items-center sidebar-logo">
                <img src="{{ asset('img/logoputih.svg') }}" alt="Logo" class="h-12 w-auto">
            </a>
            <!-- Tombol khusus sidebar -->
            <button id="sidebarToggle" class="p-2 text-gray-700 text-2xl rounded-md hover:bg-[#8B70AC] dark:text-gray-300 hover:bg-[#8B70AC]">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/kelola_Pemilik_Kos" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Pemilik Kos</span>
                </a>
            </li>
            <li>
                <a href="/admin/kelola_User" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola User</span>
                </a>
            </li>
            <li>
                <a href="/admin/kelola_Data_Kos" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Data Kos</span>
                </a>
            </li>
            <li>
                <a href="/admin/kelola_fasilitas" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Fasilitas</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<!-- Header/Navbar -->
<header id="mainHeader" class="bg-white dark:bg-gray-900 shadow p-4 flex justify-between items-center ml-72 transition-all duration-300 h-[80px]">
    <div class="flex items-center ">
        <!-- Logo di header -->
        <a href="#" class="flex items-center header-logo hidden">
            <img src="{{ asset('img/logosuko.svg') }}" alt="Logo" class="h-12 w-auto">
        </a>
    </div>

    <nav class="navbar-nav flex items-center">
        <a href="#" class="notification mr-4 p-2 text-gray-700">
            <img src="{{ asset('img/icon_notif.png') }}" class=" w-8 h-8">
        </a>
    </nav>
</header>
{{--
<!-- Breadcrumb -->
<nav class="flex ml-72 px-4 py-3 text-gray-600 text-sm bg-gray-50 dark:bg-gray-800 border-b transition-all duration-300" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-[#8B70AC]">
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
                <a href="/admin/kelola_Data_Kos" class="ml-1 text-gray-500 hover:text-[#8B70AC] md:ml-2">Kelola Data Kos</a>
            </div>
        </li>
    </ol>
</nav> --}}
