<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameGenreTable extends Migration
{
    public function up()
    {
        Schema::create('game_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('genreID'); // Primärnyckel (FK från genres)
            $table->unsignedBigInteger('gameID'); // Primärnyckel (FK från games)

            // Ange primärnyckel för relationstabellen
            $table->primary(['genreID', 'gameID']);

            // Relation till genres-tabellen
            $table->foreign('genreID')->references('genreID')->on('genres')->onDelete('cascade');
            
            // Relation till games-tabellen
            $table->foreign('gameID')->references('gameID')->on('games')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_genre'); // Raderar tabellen om migrationen rullas tillbaka
    }
}
