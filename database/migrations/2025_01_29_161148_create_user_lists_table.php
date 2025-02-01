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
        Schema::create('user_lists', function (Blueprint $table) {
            $table->id('listID');
            $table->string('listname', 255)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('userID')->nullable(); // lagt till nullable så listar inte kan ha user
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lists');
    }
};
