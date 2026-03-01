<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SeriesController extends Controller
{
    public function __invoke(): View
    {
        return view('series.index');
    }
}
