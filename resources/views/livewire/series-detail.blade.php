@php $tmdb = app(\App\Services\TMDBService::class); @endphp

<div>
    @if(!empty($series))
        {{-- Hero Backdrop --}}
        <div class="relative h-[70vh] overflow-hidden">
            <img src="{{ $tmdb->backdropUrl($series['backdrop_path'] ?? null) }}"
                 alt="{{ $series['name'] ?? '' }}"
                 class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-hero-gradient"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        {{-- Content --}}
        <div class="max-w-7xl mx-auto px-6 -mt-40 relative z-10 pb-20 animate-slide-up">
            <div class="flex flex-col md:flex-row gap-10">

                {{-- Poster --}}
                <div class="shrink-0">
                    <img src="{{ $tmdb->posterUrl($series['poster_path'] ?? null, 'w342') }}"
                         alt="{{ $series['name'] ?? '' }}"
                         class="w-52 rounded-xl shadow-2xl shadow-black/60 border border-slate-800">
                </div>

                {{-- Info --}}
                <div class="pt-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-white tracking-tight text-shadow mb-3">
                        {{ $series['name'] ?? 'Sin título' }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="text-yellow-400 font-semibold">
                            ⭐ {{ number_format($series['vote_average'] ?? 0, 1) }} / 10
                        </span>
                        @if(!empty($series['first_air_date']))
                            <span class="text-slate-400">
                                {{ \Carbon\Carbon::parse($series['first_air_date'])->format('Y') }}
                            </span>
                        @endif
                        @if(!empty($series['number_of_seasons']))
                            <span class="text-slate-400">{{ $series['number_of_seasons'] }} temporada(s)</span>
                        @endif
                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($series['genres'] ?? [] as $genre)
                            <span class="px-3 py-1 rounded-full bg-slate-800 text-slate-300 text-xs font-medium border border-slate-700">
                                {{ $genre['name'] }}
                            </span>
                        @endforeach
                    </div>

                    <p class="text-slate-300 leading-relaxed max-w-2xl mb-8">
                        {{ $series['overview'] ?? 'Sin descripción disponible.' }}
                    </p>

                    <div class="flex gap-3 flex-wrap">
                        <a href="{{ route('series.index') }}"
                           class="px-5 py-2.5 rounded-lg bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 font-medium transition-all text-sm">
                            ← Volver
                        </a>
                    </div>
                </div>
            </div>

            {{-- Cast --}}
            @if(!empty($series['credits']['cast']))
                <div class="mt-14">
                    <h2 class="text-xl font-semibold text-white mb-5 tracking-tight">Reparto Principal</h2>
                    <div class="carousel-scroll">
                        @foreach(array_slice($series['credits']['cast'], 0, 15) as $actor)
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
            <p class="text-slate-400">Serie no encontrada.</p>
        </div>
    @endif
</div>
