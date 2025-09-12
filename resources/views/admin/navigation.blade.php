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
            <img src="img/logo sukorame berdaya 2025.png" alt="Logo" class="h-10 w-auto">
        </a>
    </div>

    <nav class="navbar-nav flex items-center">
        <a href="#" class="notification mr-4 p-2 text-gray-700">
            <img src="img/icon_notif.png" class=" w-8 h-8">
        </a>
    </nav>
</header>
