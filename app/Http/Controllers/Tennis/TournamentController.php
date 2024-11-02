<?php

namespace App\Http\Controllers\Tennis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::with('winner')->get();
        return response()->json($tournaments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:male,female',
            'player_ids' => 'required|array',
            'player_ids.*' => 'exists:players,id',
            'start_date' => 'required|date',
        ]);

        // Verificar que el número de jugadores sea potencia de 2
        $playerCount = count($validated['player_ids']);
        if (!($playerCount && !($playerCount & ($playerCount - 1)))) {
            return response()->json([
                'error' => 'El número de jugadores debe ser potencia de 2'
            ], 422);
        }

        $tournament = Tournament::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'start_date' => $validated['start_date'],
            'status' => 'pending'
        ]);

        // Asociar jugadores al torneo
        $tournament->players()->attach($validated['player_ids']);

        // Iniciar el torneo
        $this->initializeTournament($tournament);

        return response()->json($tournament->load('players'), 201);
    }

    private function initializeTournament(Tournament $tournament)
    {
        $players = $tournament->players->shuffle()->values();
        $round = 1;

        // Crear los partidos iniciales
        for ($i = 0; $i < count($players); $i += 2) {
            TennisMatch::create([
                'tournament_id' => $tournament->id,
                'player1_id' => $players[$i]->id,
                'player2_id' => $players[$i + 1]->id,
                'round' => $round
            ]);
        }

        $tournament->status = 'in_progress';
        $tournament->save();
    }


    public function simulateMatch(TennisMatch $match): JsonResponse
    {
        // Aquí implementaremos la lógica para simular un partido
        $winner = $this->determineWinner($match->player1, $match->player2, $match->tournament->type);
        
        $match->winner_id = $winner->id;
        $match->save();

        return response()->json(['winner' => $winner]);
    }

    private function determineWinner(Player $player1, Player $player2, string $tournamentType)
    {
        // Implementaremos la lógica del cálculo del ganador aquí
        // Considerando habilidad, suerte y atributos específicos por género
        // Por ahora retornamos un jugador aleatorio
        return rand(0, 1) ? $player1 : $player2;
    }


}
