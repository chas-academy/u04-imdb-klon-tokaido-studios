<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Skapar tabellen i databasen.
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id('gameID'); // Primärnyckel med auto-increment.
            $table->string('title', 255); // Titel,och maxlängd 255 tecken.
            $table->text('description'); // Beskrivning, ingen maxlängd eftersom 'text' används.
            $table->timestamps(); // Skapar `created_at` och `updated_at`.
        });
    }

    /**
     * Tar bort tabellen om migrationen rullas tillbaka.
     */
    public function down()
    {
        Schema::dropIfExists('games'); // Raderar tabellen `games`.
    }
}