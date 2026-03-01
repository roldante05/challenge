<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SeriesDetailController extends Controller
{
    public function __invoke(int $id): View
    {
        return view('series.show', compact('id'));
    }
}
