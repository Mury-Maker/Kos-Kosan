@php
    // Memastikan helper Str tersedia
    use Illuminate\Support\Str;

    // Mendapatkan nama route saat ini untuk menentukan link aktif
    $currentRoute = Route::currentRouteName();
@endphp

<aside id="sidebar" class="w-72 h-screen fixed top-0 left-0 transition-all duration-300 z-40 bg-[#704E98] flex flex-col justify-between">
    <nav class="sidebar-nav p-4">
        <div class="logo flex justify-between items-center mb-4 ml-1 border-b border-gray-600 pb-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center sidebar-logo">
                <img src="{{ asset('img/logoputih.svg') }}" alt="Logo" class="h-12 w-auto">
            </a>
            <button id="sidebarToggle" class="p-2 text-gray-300 text-2xl rounded-md hover:bg-[#8B70AC]">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <ul class="space-y-2">
            {{-- Dashboard --}}
            <li>
                @php $isActive = Str::startsWith($currentRoute, 'admin.dashboard'); @endphp
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-300 rounded-lg transition {{ $isActive ? 'bg-[#8B70AC] font-semibold' : 'hover:bg-[#8B70AC]' }}">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Dashboard</span>
                </a>
            </li>

            {{-- Kelola Pemilik Kos (Data Personal) --}}
            <li>
                @php $isActive = Str::startsWith($currentRoute, 'admin.kelola_pemilik_kos'); @endphp
                <a href="{{ route('admin.kelola_pemilik_kos') }}" class="flex items-center p-3 text-gray-300 rounded-lg transition {{ $isActive ? 'bg-[#8B70AC] font-semibold' : 'hover:bg-[#8B70AC]' }}">
                    <i data-feather="users" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Pemilik Kos</span>
                </a>
            </li>

            {{-- Kelola User (Akun Login) --}}
            <li>
                @php $isActive = Str::startsWith($currentRoute, 'admin.kelola_user'); @endphp
                <a href="{{ route('admin.kelola_user') }}" class="flex items-center p-3 text-gray-300 rounded-lg transition {{ $isActive ? 'bg-[#8B70AC] font-semibold' : 'hover:bg-[#8B70AC]' }}">
                    <i data-feather="user-check" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola User</span>
                </a>
            </li>

            {{-- Kelola Data Kos --}}
            <li>
                @php $isActive = Str::startsWith($currentRoute, 'admin.kelola_kos'); @endphp
                <a href="{{ route('admin.kelola_kos') }}" class="flex items-center p-3 text-gray-300 rounded-lg transition {{ $isActive ? 'bg-[#8B70AC] font-semibold' : 'hover:bg-[#8B70AC]' }}">
                    <i data-feather="grid" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Data Kos</span>
                </a>
            </li>

            {{-- Kelola Fasilitas --}}
            <li>
                @php $isActive = Str::startsWith($currentRoute, 'admin.kelola_fasilitas'); @endphp
                <a href="{{ route('admin.kelola_fasilitas') }}" class="flex items-center p-3 text-gray-300 rounded-lg transition {{ $isActive ? 'bg-[#8B70AC] font-semibold' : 'hover:bg-[#8B70AC]' }}">
                    <i data-feather="tool" class="w-5 h-5"></i>
                    <span class="ml-3 sidebar-text">Kelola Fasilitas</span>
                </a>
            </li>
        </ul>
    </nav>

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


<header id="mainHeader" class="bg-white dark:bg-gray-900 shadow p-4 flex justify-between items-center ml-72 transition-all duration-300 h-[80px]">
    <div class="flex items-center ">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center header-logo hidden">
            <img src="{{ asset('img/logosuko.svg') }}" alt="Logo" class="h-12 w-auto">
        </a>
    </div>

    <nav class="navbar-nav flex items-center">
        {{-- Profile User/Admin --}}
        <div class="ml-4">
             @auth
             <span class="text-sm font-medium text-gray-700 hidden sm:inline">
                {{ Auth::user()->email }} ({{ ucfirst(Auth::user()->role) }})
             </span>
             @endauth
        </div>

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
