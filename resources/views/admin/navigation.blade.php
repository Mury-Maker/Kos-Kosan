<!-- Sidebar -->
<aside id="sidebar" class="w-72  h-screen fixed top-0 left-0 transition-all duration-300 z-40">
    <nav class="sidebar-nav p-4">
        <div class="logo flex justify-between items-center mb-4 ml-1 border-b border-white-700 pb-4">
            <!-- Logo di sidebar -->
            <a href="#" class="flex items-center sidebar-logo">
                <img src="{{ asset('img/logo_sukorame_putih.png') }}" alt="Logo" class="h-12 w-auto">
            </a>
            <!-- Tombol khusus sidebar -->
            <button id="sidebarToggle" class="p-2 text-gray-700 text-2xl rounded-md hover:bg-[#8B70AC] dark:text-gray-300 hover:bg-[#8B70AC]">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <ul class="space-y-2">
            <li>
                <a href="/" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/Kelola_Data_Kos" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Keloala Data Kos</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-[#8B70AC] rounded-lg transition">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Data User</span>
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
            <img src="{{ asset('img/logo sukorame berdaya 2025.png') }}" alt="Logo" class="h-10 w-auto">
        </a>
    </div>

    <nav class="navbar-nav flex items-center">
        <ul class="flex items-center">
            <li class="nav-item relative group">
                <a class="flex items-center cursor-pointer">
                    <img src="https://via.placeholder.com/30" alt="user" class="rounded-full w-8 h-8">
                    <span class="ml-2 hidden lg:inline-block text-gray-700 dark:text-gray-300">
                        Hello, <span class="font-semibold text-gray-900 dark:text-white">Admin</span>
                        <i data-feather="chevron-down" class="w-4 h-4 inline"></i>
                    </span>
                </a>
                <!-- Dropdown -->
                <ul class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 shadow-lg rounded-md opacity-0 scale-95 group-hover:opacity-100 group-hover:scale-100 transition ease-out duration-200 pointer-events-none group-hover:pointer-events-auto z-50">
                    <li><a class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center"><i data-feather="user" class="w-4 h-4 mr-2"></i> Profile</a></li>
                    <li><a class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center"><i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings</a></li>
                    <li><hr class="border-gray-200 dark:border-gray-700 my-1"></li>
                    <li><a class="block px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-700 flex items-center"><i data-feather="log-out" class="w-4 h-4 mr-2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
