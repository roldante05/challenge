<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class SeriesCarousel extends Component
{
    public string $title = 'Series Populares';
    public array $series = [];

    public function mount(TMDBService $tmdb, string $title = 'Series Populares', string $type = 'popular'): void
    {
        $this->title = $title;

        $data = match ($type) {
            'trending' => $tmdb->getTrendingSeries(),
            default    => $tmdb->getPopularSeries(),
        };

        $this->series = $data['results'] ?? [];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.series-carousel');
    }
}
