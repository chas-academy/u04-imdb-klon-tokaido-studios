<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
   // Kör funktion
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->boolean('isAdmin')->default(false)->after('password');
        });
    }

    // Rollback funktion
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->dropColumn('isAdmin');
        });
    }
};
