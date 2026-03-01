<?php

namespace App\Livewire;

use App\Services\ChannelService;
use Livewire\Component;

class ChannelGrid extends Component
{
    public string $activeCategory = 'Todos';
    public array $channels = [];
    public array $categories = [];
    public ?array $selectedChannel = null;
    public bool $showModal = false;

    public function mount(ChannelService $channelService): void
    {
        $this->categories = array_merge(['Todos'], $channelService->categories());
        $this->channels   = $channelService->all();
    }

    public function filterByCategory(string $category, ChannelService $channelService): void
    {
        $this->activeCategory = $category;
        $this->channels = $channelService->byCategory($category);
    }

    public function openChannel(int $id, ChannelService $channelService): void
    {
        $this->selectedChannel = $channelService->find($id);
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->selectedChannel = null;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.channel-grid');
    }
}
