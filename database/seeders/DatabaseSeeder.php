<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {  
                // Först, skapa plattformar och genrer
                $this->call(PlatformSeeder::class);
                $this->call(GenreSeeder::class);
                
                // Sedan, skapa spel. Viktigt att detta kommer före 'game_lists' eller relaterade tabeller
                $this->call(GameSeeder::class);
                
                // Efter spel är infogade, skapa användare och recenser
                $this->call(AdminSeeder::class);
                $this->call(UserSeeder::class);
                
                // Nu kan vi lägga till relationerna i game_lists
                $this->call(UserListSeeder::class);  // Säkerställ att detta kommer efter spel och användare
                
                // Skapa recenser om nödvändigt
                $this->call(ReviewSeeder::class);
                
                // Skapa relaterade relationer för spel och genrer
                $this->seedGameGenres();  
    }

    
        private function seedGameGenres()
        {// Definiera en koppling mellan spel och genrer
           $gameGenres = [
            'Elden Ring' => [1, 3], // Action, RPG
            'Skyrim' => [1, 2, 3], // Action, Adventure, RPG
            'Baldur\'s Gate 3' => [2, 3, 4], // Adventure, RPG, Strategy
            'Factorio' => [4], // Strategy
            'It Takes Two' => [5, 2], // Puzzle, Adventure
            'Borderlands 3' => [1, 3], // Action, RPG
            'Final Fantasy VII Rebirth' => [1, 2, 3], // Action, Adventure, RPG
            'The Witcher 3: Wild Hunt' => [2, 1, 3], // Adventure, Action, RPG
            'The Legend of Zelda: Breath of the Wild' => [2], // Adventure
            'Grand Theft Auto V' => [1, 2], // Action, Adventure
            'Portal 2' => [2, 5], // Adventure, Puzzle
            'Civilization VI' => [4], // Strategy
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