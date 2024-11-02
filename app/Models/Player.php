<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TennisMatch;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'skill_level',
        'strength',
        'speed',
        'reaction_time'
    ];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_players');
    }

    public function matches()
    {
        return $this->hasMany(TennisMatch::class, 'player1_id')
            ->orWhere('player2_id', $this->id);
    }
}
