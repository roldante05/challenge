<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MoviesController extends Controller
{
    public function __invoke(): View
    {
        return view('movies.index');
    }
}
