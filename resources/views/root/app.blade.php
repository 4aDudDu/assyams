<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'Pondok As - Syams')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js (untuk interaktivitas mobile menu) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    
    <div class="flex flex-col min-h-screen">
        
        <!-- HEADER -->
        <header class="bg-white shadow-md sticky top-0 z-50">
            @include('layouts.header')
        </header>

        <!-- KONTEN UTAMA -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer class="bg-gray-800 text-white">
            @include('layouts.footer')
        </footer>

    </div>

</body>
</html>
