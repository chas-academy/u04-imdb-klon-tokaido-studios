<?php

namespace Database\Seeders;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                "title" => "Elden Ring",
                "description" => "A challenging action RPG",
                "genres" => [1] // Action
            ],
            [
                "title" => "Skyrim",
                "description" => "An open-world fantasy RPG",
                "genres" => [2] // Adventure
            ],
            [
                "title" => "Baldur's Gate 3",
                "description" => "An epic RPG with rich storylines",
                "genres" => [3] // RPG
            ],
            [
                "title" => "Factorio",
                "description" => "A strategy game about building factories",
                "genres" => [4] // Strategy
            ],
            [
                "title" => "It Takes Two",
                "description" => "A co-op puzzle adventure game",
                "genres" => [5] // Puzzle
            ]
        ];
        // för att skapa och koppla genrer
        foreach ($games as $game) {
            $newGame = Game::create([
                'title' => $game['title'],
                'description' => $game['description'],
            ]);

            // Koppla spelet till genrer
            $newGame->genres()->sync($game['genres']);
        }
    }
}