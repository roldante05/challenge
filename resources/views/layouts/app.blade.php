<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tv FlexDan — Películas, Series y Canales de TV Argentina">
    <title>{{ $title ?? 'Tv FlexDan' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen">
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <footer class="mt-20 border-t border-slate-800 py-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="text-brand-red font-bold text-xl">TV</span>
                <span class="font-bold text-white text-xl">FlexDan</span>
            </div>
            <p class="text-slate-500 text-sm">
                Proyecto demostrativo. Datos provistos por
                <a href="https://www.themoviedb.org" class="text-brand-red hover:underline" target="_blank">TMDB</a>.
                Sin streaming real.
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
