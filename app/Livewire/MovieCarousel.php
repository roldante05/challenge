<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class MovieCarousel extends Component
{
    public string $title = 'Películas Populares';
    public array $movies = [];

    public function mount(TMDBService $tmdb, string $title = 'Películas Populares', string $type = 'popular'): void
    {
        $this->title = $title;

        $data = match ($type) {
            'trending' => $tmdb->getTrendingMovies(),
            default    => $tmdb->getPopularMovies(),
        };

        $this->movies = $data['results'] ?? [];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.movie-carousel');
    }
}
