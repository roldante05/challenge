<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ChannelsController extends Controller
{
    public function __invoke(): View
    {
        return view('channels.index');
    }
}
