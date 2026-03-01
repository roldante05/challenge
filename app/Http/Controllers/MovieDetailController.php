<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MovieDetailController extends Controller
{
    public function __invoke(int $id): View
    {
        return view('movies.show', compact('id'));
    }
}
