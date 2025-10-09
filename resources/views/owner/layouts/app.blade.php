<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Owner Dashboard')</title>
    {{-- Tailwind & Flowbite --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    {{-- Font Awesome & Feather --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-[#FFFCFC]">

    {{-- Sidebar & Navbar --}}
    @include('owner.layouts.navigation')

    <!-- Main content -->
    <main id="mainContent" class="p-6 ml-72 transition-all duration-300">
        @yield('content')
    </main>

    <script>
        feather.replace(); // aktifkan feather icons

        const sidebar = document.getElementById("sidebar");
        const toggleSidebarBtn = document.getElementById("sidebarToggle");
        const toggleHeaderBtn = document.getElementById("headerToggle");
        const mainContent = document.getElementById("mainContent");
        const header = document.getElementById("mainHeader");
        const headerLogo = document.querySelector(".header-logo");

        let isOpen = true;

        function toggleSidebar() {
            isOpen = !isOpen;
            if (isOpen) {
                // sidebar lebar
                sidebar.classList.remove("sidebar-collapsed");
                sidebar.classList.add("w-72");

                mainContent.classList.remove("ml-20");
                header.classList.remove("ml-20");
                mainContent.classList.add("ml-72");
                header.classList.add("ml-72");

                // logo tampil di sidebar, sembunyikan di header
                headerLogo.classList.remove("show");
            } else {
                // sidebar kecil
                sidebar.classList.remove("w-72");
                sidebar.classList.add("sidebar-collapsed");

                mainContent.classList.remove("ml-72");
                header.classList.remove("ml-72");
                mainContent.classList.add("ml-20");
                header.classList.add("ml-20");

                // logo hilang di sidebar, tampil di header
                headerLogo.classList.add("show");
            }
        }

        toggleSidebarBtn.addEventListener("click", toggleSidebar);
        toggleHeaderBtn.addEventListener("click", toggleSidebar);
    </script>
</body>
</html>
