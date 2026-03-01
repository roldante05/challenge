<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class SeriesDetail extends Component
{
    public int $seriesId;
    public array $series = [];

    public function mount(TMDBService $tmdb, int $seriesId): void
    {
        $this->seriesId = $seriesId;
        $this->series   = $tmdb->getSeriesDetail($seriesId);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.series-detail');
    }
}
