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
                "genres" => [1, 3], // Action, RPG
                "platforms" => [1, 3, 4, 2, 5], // PC, PS5, Xbox Series X/S, PS4, Xbox One
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/elden_ring.jpg",
                "video_url" => "https://youtu.be/AKXiKBnzpBQ?feature=shared"
            ],
            [
                "title" => "Skyrim",
                "description" => "An open-world fantasy RPG",
                "genres" => [1, 2, 3], // Action, Adventure, RPG
                "platforms" => [1, 2, 3, 4, 5, 6], // PC, PS3, Xbox 360, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/skyrim.jpg",
                "video_url" => "https://youtu.be/6umhTJQltak?feature=shared"
            ],
            [
                "title" => "Baldur's Gate 3",
                "description" => "An epic RPG with rich storylines, blending adventure, RPG, and strategy elements.",
                "genres" => [2, 3, 4], // Adventure, RPG, Strategy
                "platforms" => [1, 3, 4], // PC, PS5, Xbox Series X/S
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/baldurs_gate_3.jpg",
                "video_url" => "https://youtu.be/1T22wNvoNiU?feature=shared"
            ],
            [
                "title" => "Factorio",
                "description" => "A strategy game about building factories",
                "genres" => [4], // Strategy
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/factorio.jpg",
                "video_url" => "https://youtu.be/J8SBp4SyvLc?feature=shared"
            ],
            [
                "title" => "It Takes Two",
                "description" => "A co-op puzzle adventure game",
                "genres" => [5, 2], // Puzzle, Adventure
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/it_takes_two.jpg",
                "video_url" => "https://youtu.be/ohClxMmNLQQ?feature=shared"
            ],
            [
                "title" => "Borderlands 3",
                "description" => "An action-adventure game with a unique story",
                "genres" => [1, 3], // Action, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/borderlands_3.jpg",
                "video_url" => "https://youtu.be/gjLQ2Uj4OPw?feature=shared"
            ],
            [
                "title" => "Final Fantasy VII Rebirth",
                "description" => "A new chapter in the Final Fantasy series with action, adventure, and RPG elements.",
                "genres" => [1, 2, 3], // Action, Adventure, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/final_fantasy_vii_rebirth.jpg",
                "video_url" => "https://youtu.be/utVE4aUKYuY?feature=shared"
            ],
            [
                "title" => "The Witcher 3: Wild Hunt",
                "description" => "An RPG game with a classic story",
                "genres" => [2, 1, 3], // Adventure, Action, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/wild_hunt.jpg",
                "video_url" => "https://youtu.be/XHrskkHf958?feature=shared"
            ],
            [
                "title" => "The Legend of Zelda: Breath of the Wild",
                "description" => "An open-world adventure game",
                "genres" => [2], // Adventure
                "platforms" => [6], // Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/breath_of_the_wild.jpg",
                "video_url" => "https://youtu.be/zw47_q9wbBE?feature=shared"
            ],
            [
                "title" => "Grand Theft Auto V",
                "description" => "An open-world action-adventure game",
                "genres" => [1, 2], // Action, Adventure
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/gta_v.jpg",
                "video_url" => "https://youtu.be/QkkoHAzjnUs?feature=shared"
            ],
            [
                "title" => "Portal 2",
                "description" => "An adventure/puzzle game with great voice acting",
                "genres" => [2, 5], // Adventure, Puzzle
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/portal_2.png",
                "video_url" => "https://youtu.be/A88YiZdXugA?feature=shared"
            ],
            [
                "title" => "Civilization VI",
                "description" => "A classic strategy game",
                "genres" => [4], // Strategy
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/civilization_6.jpg",
                "video_url" => "https://youtu.be/5KdE0p2joJw?feature=shared"
            ]
        ];
        
        
        foreach ($games as $game) {
            // Skapa spelet om det inte redan finns med samma titel, annars hämta det
            $newGame = Game::firstOrCreate(
                ['title' => $game['title']],
                [
                    'description' => $game['description'],
                    'image' => $game['image_url'],
                    'trailer' => $game['video_url']
                ]
            );

            // Koppla spelet till genrer
            $newGame->genres()->sync($game['genres']);


                // koppla spelet till platforms
                $newGame->platforms()->sync($game['platforms']);
            
        }
    }
}