@php $tmdb = app(\App\Services\TMDBService::class); @endphp

<div>
    @if(count($featured) > 0)
        @php $item = $featured[$currentIndex]; @endphp
        <div class="relative min-h-screen flex items-end overflow-hidden"
             wire:key="hero-{{ $currentIndex }}">

            {{-- Background image --}}
            <div class="absolute inset-0 transition-opacity duration-700">
                <img src="{{ $tmdb->backdropUrl($item['backdrop_path'] ?? null) }}"
                     alt="{{ $item['title'] ?? $item['name'] ?? '' }}"
                     class="w-full h-full object-cover opacity-60"
                     loading="eager">
                <div class="absolute inset-0 bg-hero-gradient"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
            </div>

            {{-- Content --}}
            <div class="relative z-10 max-w-7xl mx-auto px-6 pb-24 pt-40 w-full animate-fade-in">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 text-brand-red text-xs font-semibold uppercase tracking-widest mb-3">
                        <span class="w-4 h-0.5 bg-brand-red inline-block"></span>
                        En Tendencia
                    </span>

                    <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight text-shadow leading-tight mb-4">
                        {{ $item['title'] ?? $item['name'] ?? 'Sin título' }}
                    </h1>

                    <div class="flex items-center gap-4 mb-5">
                        <span class="text-yellow-400 font-semibold text-sm">
                            ⭐ {{ number_format($item['vote_average'] ?? 0, 1) }}
                        </span>
                        <span class="text-slate-400 text-sm">
                            {{ isset($item['release_date']) ? \Carbon\Carbon::parse($item['release_date'])->format('Y') : '' }}
                        </span>
                    </div>

                    <p class="text-slate-300 text-base leading-relaxed line-clamp-3 mb-8 max-w-lg">
                        {{ $item['overview'] ?? 'Sin descripción disponible.' }}
                    </p>

                    <div class="flex items-center gap-3 flex-wrap">
                        <a href="{{ route('movies.show', $item['id']) }}"
                           class="px-6 py-3 bg-brand-red text-white font-semibold rounded-lg
                                  hover:bg-brand-red-dark transition-all duration-200 hover:scale-105 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                            Ver Detalles
                        </a>
                        <button class="px-6 py-3 glass text-white font-semibold rounded-lg hover:bg-slate-700/60 transition-all duration-200">
                            + Mi Lista
                        </button>
                    </div>
                </div>

                {{-- Dots navigation --}}
                <div class="flex items-center gap-2 mt-10">
                    @foreach($featured as $i => $f)
                        <button wire:click="selectSlide({{ $i }})"
                                class="transition-all duration-300 rounded-full
                                       {{ $i === $currentIndex ? 'w-8 h-2 bg-brand-red' : 'w-2 h-2 bg-slate-600 hover:bg-slate-400' }}">
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Arrow controls --}}
            <button wire:click="previous"
                    class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-3 glass rounded-full hover:scale-110 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button wire:click="next"
                    class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-3 glass rounded-full hover:scale-110 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    @endif
</div>
