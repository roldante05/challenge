<?php

namespace App\Services;

use App\Data\Channels;

class ChannelService
{
    public function all(): array
    {
        return Channels::all();
    }

    public function categories(): array
    {
        return Channels::categories();
    }

    public function byCategory(string $category): array
    {
        return Channels::byCategory($category);
    }

    public function find(int $id): ?array
    {
        return Channels::find($id);
    }
}
