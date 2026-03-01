@php $tmdb = app(\App\Services\TMDBService::class); @endphp

<div>
    @if(!empty($movie))
        {{-- Hero Backdrop --}}
        <div class="relative h-[70vh] overflow-hidden">
            <img src="{{ $tmdb->backdropUrl($movie['backdrop_path'] ?? null) }}"
                 alt="{{ $movie['title'] ?? '' }}"
                 class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-hero-gradient"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        {{-- Content --}}
        <div class="max-w-7xl mx-auto px-6 -mt-40 relative z-10 pb-20 animate-slide-up">
            <div class="flex flex-col md:flex-row gap-10">

                {{-- Poster --}}
                <div class="shrink-0">
                    <img src="{{ $tmdb->posterUrl($movie['poster_path'] ?? null, 'w342') }}"
                         alt="{{ $movie['title'] ?? '' }}"
                         class="w-52 rounded-xl shadow-2xl shadow-black/60 border border-slate-800">
                </div>

                {{-- Info --}}
                <div class="pt-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-white tracking-tight text-shadow mb-3">
                        {{ $movie['title'] ?? 'Sin título' }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="text-yellow-400 font-semibold">
                            ⭐ {{ number_format($movie['vote_average'] ?? 0, 1) }} / 10
                        </span>
                        <span class="text-slate-400">
                            {{ isset($movie['release_date']) ? \Carbon\Carbon::parse($movie['release_date'])->format('d/m/Y') : 'N/A' }}
                        </span>
                        @if(!empty($movie['runtime']))
                            <span class="text-slate-400">{{ $movie['runtime'] }} min</span>
                        @endif
                    </div>

                    {{-- Genres --}}
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($movie['genres'] ?? [] as $genre)
                            <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-xs font-medium border border-slate-700">
                                {{ $genre['name'] }}
                            </span>
                        @endforeach
                    </div>

                    <p class="text-slate-300 leading-relaxed max-w-2xl mb-8">
                        {{ $movie['overview'] ?? 'Sin descripción disponible.' }}
                    </p>

                    <div class="flex gap-3 flex-wrap">
                        <a href="{{ route('movies.index') }}"
                           class="px-5 py-2.5 rounded-lg bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 font-medium transition-all text-sm">
                            ← Volver
                        </a>
                        <div class="px-5 py-2.5 rounded-lg bg-slate-800/60 border border-slate-700 text-slate-400 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-brand-red" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            Proyecto demostrativo — sin streaming.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cast --}}
            @if(!empty($movie['credits']['cast']))
                <div class="mt-14">
                    <h2 class="text-xl font-semibold text-white mb-5 tracking-tight">Reparto Principal</h2>
                    <div class="carousel-scroll">
                        @foreach(array_slice($movie['credits']['cast'], 0, 15) as $actor)
                            <div class="shrink-0 w-28 text-center">
                                <img src="{{ $tmdb->posterUrl($actor['profile_path'] ?? null, 'w185') }}"
                                     alt="{{ $actor['name'] }}"
                                     class="w-20 h-20 rounded-full object-cover mx-auto mb-2 bg-slate-800 border-2 border-slate-700">
                                <p class="text-white text-xs font-semibold leading-tight">{{ $actor['name'] }}</p>
                                <p class="text-slate-500 text-xs mt-0.5 line-clamp-1">{{ $actor['character'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="min-h-screen flex items-center justify-center">
            <p class="text-slate-400">Película no encontrada.</p>
        </div>
    @endif
</div>
