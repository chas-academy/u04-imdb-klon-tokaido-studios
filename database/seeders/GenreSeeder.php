<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        //definera genrer
    $genres = [
        [
            "genreID" => 1,
            "name" => "Action"
        ],
        [
            "genreID" => 2,
            "name" => "Adventure"
        ],
        [
            "genreID" => 3,
            "name" => "RPG"
        ],
        [
            "genreID" => 4,
            "name" => "Strategy"
        ],
        [
            "genreID" => 5,
            "name" => "Puzzle"
        ]
    ];

    foreach ($genres as $genre) {
        Genre::create([
            'genreID' => $genre['genreID'],
            'name' => $genre['name'],
            'description' => "Games in the {$genre['name']} genre"

        ]);
        }
    }
}
