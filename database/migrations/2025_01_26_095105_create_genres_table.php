<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id('genreID'); // Primärnyckel med auto-increment
            $table->string('name')->unique(); // Genre-namn, unik
            $table->string('description', 255)->nullable(); // Beskrivning, valfri
            $table->timestamps(); // Skapar `created_at` och `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('genres'); // Raderar tabellen om migrationen rullas tillbaka
    }
}