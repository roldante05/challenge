<?php

namespace App\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class HeroBanner extends Component
{
    public array $featured = [];
    public int $currentIndex = 0;

    public function mount(TMDBService $tmdb): void
    {
        $data = $tmdb->getTrendingMovies();
        $this->featured = array_slice($data['results'] ?? [], 0, 5);
    }

    public function next(): void
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->featured);
    }

    public function previous(): void
    {
        $count = count($this->featured);
        $this->currentIndex = ($this->currentIndex - 1 + $count) % $count;
    }

    public function selectSlide(int $index): void
    {
        $this->currentIndex = $index;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.hero-banner');
    }
}
