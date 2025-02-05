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
        Schema::create('games_platforms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gameID')->constrained()->onDelete('cascade');  // Skapar en kolumn för game_id och sätter en foreign key constraint till games-tabellen.
            $table->foreignId('platformID')->constrained()->onDelete('cascade');  // Skapar en kolumn för platform_id och sätter en foreign key constraint till platforms-tabellen.
            $table->timestamps();  // Skapar created_at och updated_at kolumner.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_platforms');
    }
};
