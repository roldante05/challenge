@php $tmdb = app(\App\Services\TMDBService::class); @endphp

<div>
    {{-- Genre Filters --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <button wire:click="filterByGenre(0)"
                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                       {{ $selectedGenre === 0
                           ? 'bg-brand-red text-white shadow-lg shadow-brand-red/30'
                           : 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white' }}">
            Todos
        </button>
        @foreach($genres as $genre)
            <button wire:click="filterByGenre({{ $genre['id'] }})"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ $selectedGenre === $genre['id']
                               ? 'bg-brand-red text-white shadow-lg shadow-brand-red/30'
                               : 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white' }}">
                {{ $genre['name'] }}
            </button>
        @endforeach
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
        @foreach($movies as $movie)
            <a href="{{ route('movies.show', $movie['id']) }}"
               class="card-hover group relative rounded-lg overflow-hidden bg-slate-900">

                <img src="{{ $tmdb->posterUrl($movie['poster_path'] ?? null) }}"
                     alt="{{ $movie['title'] ?? '' }}"
                     class="w-full aspect-[2/3] object-cover"
                     loading="lazy">

                <div class="absolute inset-0 bg-card-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3">
                    <p class="text-white text-sm font-semibold line-clamp-2">{{ $movie['title'] ?? '' }}</p>
                    <span class="text-yellow-400 text-xs mt-1">⭐ {{ number_format($movie['vote_average'] ?? 0, 1) }}</span>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Load More --}}
    @if($hasMore)
        <div class="text-center mt-10">
            <button wire:click="loadMore" wire:loading.attr="disabled"
                    class="px-8 py-3 bg-slate-800 text-white font-semibold rounded-lg
                           hover:bg-slate-700 transition-all duration-200 disabled:opacity-50">
                <span wire:loading.remove wire:target="loadMore">Cargar más</span>
                <span wire:loading wire:target="loadMore">Cargando...</span>
            </button>
        </div>
    @endif
</div>
