<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class SeriesList extends Component
{
    public array $genres = [];
    public int $selectedGenre = 0;
    public array $series = [];
    public int $currentPage = 1;
    public bool $hasMore = true;

    public function mount(TMDBService $tmdb): void
    {
        $this->genres = $tmdb->getTvGenres();
        $this->loadSeries($tmdb);
    }

    public function filterByGenre(int $genreId, TMDBService $tmdb): void
    {
        $this->selectedGenre = $genreId;
        $this->currentPage   = 1;
        $this->series        = [];
        $this->hasMore       = true;
        $this->loadSeries($tmdb);
    }

    public function loadMore(TMDBService $tmdb): void
    {
        $this->currentPage++;
        $this->loadSeries($tmdb);
    }

    private function loadSeries(TMDBService $tmdb): void
    {
        $data = $this->selectedGenre > 0
            ? $tmdb->getSeriesByGenre($this->selectedGenre, $this->currentPage)
            : $tmdb->getPopularSeries($this->currentPage);

        $results      = $data['results'] ?? [];
        $this->series = $this->currentPage === 1
            ? $results
            : array_merge($this->series, $results);

        $this->hasMore = ($data['page'] ?? 1) < ($data['total_pages'] ?? 1);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.series-list');
    }
}
