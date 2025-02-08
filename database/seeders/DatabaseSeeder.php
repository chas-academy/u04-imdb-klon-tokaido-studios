<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {   // anropar seeders
        $this->call(GenreSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(AdminSeeder::class);
       $this->call(UserSeeder::class);
        $this->call(UserListSeeder::class);
       $this->call(ReviewSeeder::class);
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
        $genres = Genre::all()->keyBy('name');
        $games = Game::all()->keyBy('title');
        foreach ($gameGenres as $gameTitle => $genreNames) {
            if (!isset($games[$gameTitle])) {
                continue; // Hoppa över om spelet inte finns i databasen
            }
            $game = $games[$gameTitle];
            foreach ($genreNames as $genreName) {
                if (!isset($genres[$genreName])) {
                    continue; // Hoppa över om genren inte finns i databasen
                }
                $genre = $genres[$genreName];
                // Kontrollera om relationen redan existerar innan den skapas
                if (!$game->genres->contains($genre->genreID)) {
                    $game->genres()->attach($genre->genreID);
                }
            }
        }
    }
}