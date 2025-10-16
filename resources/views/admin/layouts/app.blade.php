<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    {{-- Tailwind & Flowbite --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">

    {{-- Font Awesome & Feather --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles') {{-- TAMBAHAN: Tempat CSS Khusus (untuk Leaflet CSS) --}}
</head>
<body class="bg-[#FFFCFC]">

    {{-- Sidebar & Navbar --}}
    @include('admin.layouts.navigation')

    <main id="mainContent" class="p-6 ml-72 transition-all duration-300">
        @yield('content')
    </main>

    <script>
        // ... [Kode toggle sidebar Anda] ...
        feather.replace();

        const sidebar = document.getElementById("sidebar");
        const toggleSidebarBtn = document.getElementById("sidebarToggle");
        const mainContent = document.getElementById("mainContent");
        const header = document.getElementById("mainHeader");
        const headerLogo = document.querySelector(".header-logo");

        let isOpen = true;

        function toggleSidebar() {
            isOpen = !isOpen;
            if (isOpen) {
                sidebar.classList.remove("sidebar-collapsed");
                sidebar.classList.add("w-72");
                mainContent.classList.remove("ml-20");
                header.classList.remove("ml-20");
                mainContent.classList.add("ml-72");
                header.classList.add("ml-72");
                headerLogo.classList.remove("show");
            } else {
                sidebar.classList.remove("w-72");
                sidebar.classList.add("sidebar-collapsed");
                mainContent.classList.remove("ml-72");
                header.classList.remove("ml-72");
                mainContent.classList.add("ml-20");
                header.classList.add("ml-20");
                headerLogo.classList.add("show");
            }
        }

        toggleSidebarBtn.addEventListener("click", toggleSidebar);
        // Asumsi toggleHeaderBtn adalah tombol toggle yang sama di sidebar.
        // Jika tidak, Anda harus mendapatkan elemen untuk toggleHeaderBtn.
        // document.getElementById("headerToggle").addEventListener("click", toggleSidebar);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @yield('scripts') {{-- TAMBAHAN: Tempat JS Khusus (untuk Leaflet JS) --}}
</body>
</html>
