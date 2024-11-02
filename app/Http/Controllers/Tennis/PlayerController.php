<?php

namespace App\Http\Controllers\Tennis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'skill_level' => 'required|integer|between:0,100',
            'strength' => 'nullable|numeric|between:0,100',
            'speed' => 'nullable|numeric|between:0,100',
            'reaction_time' => 'nullable|numeric|between:0,100',
        ]);

        $player = Player::create($validated);
        return response()->json($player, 201);
    }


    public function show(Player $player)
    {
        return response()->json($player);
    }
}
