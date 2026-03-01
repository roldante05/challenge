@php $tmdb = app(\App\Services\TMDBService::class); @endphp

<div class="py-2">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-xl font-semibold text-white mb-4 tracking-tight">{{ $title }}</h2>
    </div>

    <div class="max-w-7xl mx-auto px-6 carousel-scroll">
        @foreach($series as $show)
            <a href="{{ route('series.show', $show['id']) }}"
               class="card-hover group relative rounded-lg overflow-hidden cursor-pointer"
               style="width: 180px;">

                <img src="{{ $tmdb->posterUrl($show['poster_path'] ?? null) }}"
                     alt="{{ $show['name'] ?? '' }}"
                     class="w-full h-64 object-cover bg-slate-800"
                     loading="lazy">

                <div class="absolute inset-0 bg-card-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3">
                    <p class="text-white text-sm font-semibold line-clamp-2 leading-tight">
                        {{ $show['name'] ?? 'Sin título' }}
                    </p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-yellow-400 text-xs">⭐ {{ number_format($show['vote_average'] ?? 0, 1) }}</span>
                        <span class="text-slate-400 text-xs">
                            {{ isset($show['first_air_date']) ? \Carbon\Carbon::parse($show['first_air_date'])->format('Y') : '' }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
