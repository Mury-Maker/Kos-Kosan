<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Kos Sukorame')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Asumsi Anda menggunakan Laravel/template engine lain --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-[#FFFCFC] font-sans m-0">


    {{-- Sidebar & Navbar --}}
    @include('guest.layouts.nav')

    <!-- Main content -->
    <main id="mainContent" >
        @yield('content')
    </main>

    @include('guest.layouts.footer')

    </body>
</html>
