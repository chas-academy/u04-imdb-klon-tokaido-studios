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
            $table->id('gameID');
            $table->string('title', 255)->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('trailer')->nullable();
            $table->timestamps();
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