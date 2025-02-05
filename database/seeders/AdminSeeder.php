<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    // För att skapa fler admin användarem Kopiera DB::table 
    // och klistra in i funktionen
    public function run(): void
    {
        DB::table('users')->updateOrInsert
        (   ['email' => 'admin@igdb.se'], //Primärt villkor
            [
                'username' => 'Admin',
                'password' => Hash::make('loggain123'),
                'isAdmin' => true,
                'country' => 'Sweden',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}