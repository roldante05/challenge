<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TennisMatch;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MatchController extends Controller
{
    public function index(): JsonResponse
    {
        $matches = TennisMatch::with(['player1', 'player2', 'winner'])->get();
        return response()->json($matches);
    }

    public function show(TennisMatch $match): JsonResponse
    {
        return response()->json($match->load(['player1', 'player2', 'winner']));
    }

    // ... otros métodos según necesidad ...
}