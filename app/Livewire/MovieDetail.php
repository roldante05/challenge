<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class MovieDetail extends Component
{
    public int $movieId;
    public array $movie = [];

    public function mount(TMDBService $tmdb, int $movieId): void
    {
        $this->movieId = $movieId;
        $this->movie   = $tmdb->getMovieDetail($movieId);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.movie-detail');
    }
}
