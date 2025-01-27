<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'RPG',
            'Strategy',
            'Puzzle'
        ];

        foreach ($genres as $genreName) {
            Genre::create([
                'name' => $genreName,
                'description' => "Games in the {$genreName} genre"
            ]);
        }
    }
}
