<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {// anropar seeders
        $this->call(GenreSeeder::class);
        $this->call(GameSeeder::class);
        // skapar realtioner
        $this->seedGameGenres();

    }
        private function seedGameGenres()
        {// Definiera en koppling mellan spel och genrer
           $gameGenres = [
            'Elden Ring' => ['Action'],
            'Skyrim' => ['Adventure'],
            'Baldur\'s Gate 3' => ['RPG'],
            'Factorio' => ['Strategy'],
            'It Takes Two' => ['Puzzle'],
            'Borderlands 3' => ['Action', 'Adventure'],
            'Final Fantasy VII' => ['RPG'],
            'The Witcher 3: Wild Hunt' => ['Action', 'Adventure'],
            'The Legend of Zelda: Breath of the Wild' => ['Adventure'],
            'Grand Theft Auto V' => ['Action', 'Adventure'],
            'Portal 2' => ['Action', 'Puzzle'],
            'Civilization VI' => ['Strategy'],
            'COD' => ['Action']
        ];

    // Hämta alla genrer som redan finns i databasen
    $genres = Genre::all()->keyBy('name');

    // Hämta alla spel som redan finns i databasen
    $games = Game::all();

    // Koppla genrer till spel
    foreach ($games as $game) {
        // Om spelet finns i $gameGenres
        if (isset($gameGenres[$game->title])) {
            // Hämta genrer för spelet
            $genreNames = $gameGenres[$game->title];

            // Hitta motsvarande genreID från genreNames och koppla till spelet
            $game->genres()->attach(
                collect($genreNames)->map(fn($name) => $genres[$name]->genreID)->toArray()
            );
        }
    }
}   
}
