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
            ],
            [
                "title" => "Borderlands 3",
                "description" => "An action-adventure game with a unique story",
                "genres" => [1, 2] // Action, Adventure
            ],
            [
                "title" => "Final Fantasy VII",
                "description" => "An RPG game with a classic story",
                "genres" => [3] // RPG
            ],
            [
                "title" => "The Witcher 3: Wild Hunt",
                "description" => "An RPG game with a classic story",
                "genres" => [2, 1] // Adventure, Action
            ],
            [
                "title" => "The Legend of Zelda: Breath of the Wild",
                "description" => "An open-world adventure game",
                "genres" => [2] // Adventure
            ],
            [
                "title" => "Grand Theft Auto V",
                "description" => "An open-world action-adventure game",
                "genres" => [1, 2] // Action, Adventure
            ],
            [
                "title" => "Portal 2",
                "description" => "An adventure/puzzle game with great voice acting",
                "genres" => [2, 5] // Adventure, RPG
            ],
            [
                "title" => "Civilization VI",
                "description" => "A classic strategy game",
                "genres" => [4] // RPG, Action
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