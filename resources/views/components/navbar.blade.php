<nav x-data="{ open: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
     :class="scrolled ? 'bg-slate-950/95 backdrop-blur-sm shadow-lg shadow-black/30' : 'bg-transparent'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-6">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-1 shrink-0">
            <span class="text-brand-red font-bold text-2xl tracking-tight">TV</span>
            <span class="font-bold text-white text-2xl tracking-tight">FlexDan</span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('home') }}"
               class="text-sm font-medium transition-colors duration-200
                      {{ request()->routeIs('home') ? 'text-white' : 'text-slate-400 hover:text-white' }}">
                Inicio
            </a>
            <a href="{{ route('movies.index') }}"
               class="text-sm font-medium transition-colors duration-200
                      {{ request()->routeIs('movies.*') ? 'text-white' : 'text-slate-400 hover:text-white' }}">
                Películas
            </a>
            <a href="{{ route('series.index') }}"
               class="text-sm font-medium transition-colors duration-200
                      {{ request()->routeIs('series.*') ? 'text-white' : 'text-slate-400 hover:text-white' }}">
                Series
            </a>
            <a href="{{ route('channels.index') }}"
               class="text-sm font-medium transition-colors duration-200
                      {{ request()->routeIs('channels.*') ? 'text-white' : 'text-slate-400 hover:text-white' }}">
                Canales AR
            </a>
        </div>

        {{-- CTA Button --}}
        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('movies.index') }}"
               class="px-4 py-2 rounded-md bg-brand-red text-white text-sm font-semibold
                      hover:bg-brand-red-dark transition-all duration-200 hover:scale-105">
                Explorar
            </a>
        </div>

        {{-- Mobile menu button --}}
        <button @click="open = !open" class="md:hidden text-slate-400 hover:text-white transition-colors">
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-slate-900/95 backdrop-blur-sm border-t border-slate-800 px-6 py-4 flex flex-col gap-4">
        <a href="{{ route('home') }}"       class="text-slate-300 hover:text-white font-medium transition-colors">Inicio</a>
        <a href="{{ route('movies.index') }}" class="text-slate-300 hover:text-white font-medium transition-colors">Películas</a>
        <a href="{{ route('series.index') }}" class="text-slate-300 hover:text-white font-medium transition-colors">Series</a>
        <a href="{{ route('channels.index') }}" class="text-slate-300 hover:text-white font-medium transition-colors">Canales AR</a>
    </div>
</nav>
