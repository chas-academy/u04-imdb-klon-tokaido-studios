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
        Schema::create('game_lists', function (Blueprint $table) {
            $table->unsignedBigInteger('listID');
            $table->unsignedBigInteger('gameID');
            $table->primary(['listID', 'gameID']);
            $table->foreign('listID')->references('listID')->on('user_lists')->onDelete('cascade');
            $table->foreign('gameID')->references('gameID')->on('games')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_lists');
    }
};
