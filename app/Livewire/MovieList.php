<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;
use Livewire\WithPagination;

class MovieList extends Component
{
    use WithPagination;

    public array $genres = [];
    public int $selectedGenre = 0;
    public array $movies = [];
    public int $currentPage = 1;
    public bool $hasMore = true;
    public bool $loading = false;

    public function mount(TMDBService $tmdb): void
    {
        $this->genres = $tmdb->getMovieGenres();
        $this->loadMovies($tmdb);
    }

    public function filterByGenre(int $genreId, TMDBService $tmdb): void
    {
        $this->selectedGenre = $genreId;
        $this->currentPage   = 1;
        $this->movies        = [];
        $this->hasMore       = true;
        $this->loadMovies($tmdb);
    }

    public function loadMore(TMDBService $tmdb): void
    {
        $this->currentPage++;
        $this->loadMovies($tmdb);
    }

    private function loadMovies(TMDBService $tmdb): void
    {
        $data = $this->selectedGenre > 0
            ? $tmdb->getMoviesByGenre($this->selectedGenre, $this->currentPage)
            : $tmdb->getPopularMovies($this->currentPage);

        $results      = $data['results'] ?? [];
        $this->movies = $this->currentPage === 1
            ? $results
            : array_merge($this->movies, $results);

        $this->hasMore = ($data['page'] ?? 1) < ($data['total_pages'] ?? 1);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.movie-list');
    }
}
