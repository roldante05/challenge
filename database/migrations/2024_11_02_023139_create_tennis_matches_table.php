<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained();
            $table->foreignId('player1_id')->constrained('players');
            $table->foreignId('player2_id')->constrained('players');
            $table->foreignId('winner_id')->nullable()->constrained('players');
            $table->integer('round');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tennis_matches');
    }
};
