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
                "description" => 'An action RPG developed by FromSoftware, set in the mystical world of the "Lands Between." With an open world, challenging combat, and deep lore co-created by George R.R. Martin, Elden Ring is known for its punishing difficulty, exploration, and intricate design, offering players an epic journey.',
                "genres" => [1, 3], // Action, RPG
                "platforms" => [1, 3, 4, 2, 5], // PC, PS5, Xbox Series X/S, PS4, Xbox One
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/elden_ring.jpg",
                "video_url" => "https://youtu.be/AKXiKBnzpBQ?feature=shared"
            ],
            [
                "title" => "Skyrim",
                "description" => " A classic open-world RPG set in the northern province of Tamriel, Skyrim lets you play as the Dragonborn, a hero destined to stop the ancient dragon Alduin. It features open-ended gameplay, extensive mod support, and a rich world full of dragons, magic, and lore.",
                "genres" => [1, 2, 3], // Action, Adventure, RPG
                "platforms" => [1, 2, 3, 4, 5, 6], // PC, PS3, Xbox 360, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/skyrim.jpg",
                "video_url" => "https://youtu.be/6umhTJQltak?feature=shared"
            ],
            [
                "title" => "Baldur's Gate 3",
                "description" => "A turn-based RPG set in the Dungeons & Dragons universe, Baldur’s Gate 3 immerses players in a deep narrative, with choice-driven gameplay and tactical combat. Developed by Larian Studios, it offers both single-player and co-op experiences with intricate character customization and a rich story.",
                "genres" => [2, 3, 4], // Adventure, RPG, Strategy
                "platforms" => [1, 3, 4], // PC, PS5, Xbox Series X/S
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/baldurs_gate_3.jpg",
                "video_url" => "https://youtu.be/1T22wNvoNiU?feature=shared"
            ],
            [
                "title" => "Factorio",
                "description" => "A real-time strategy and simulation game focused on resource management, automation, and factory-building. Players work to build and optimize complex factories while defending against hostile creatures, all while expanding and improving the production chain.",
                "genres" => [4], // Strategy
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/factorio.jpg",
                "video_url" => "https://youtu.be/J8SBp4SyvLc?feature=shared"
            ],
            [
                "title" => "It Takes Two",
                "description" => "A loot-driven first-person shooter with RPG elements, Borderlands 3 features the chaotic world of Pandora. Players choose from unique characters known as Vault Hunters and embark on a mission to stop the villainous Calypso twins while collecting tons of weapons and gear",
                "genres" => [5, 2], // Puzzle, Adventure
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/it_takes_two.jpg",
                "video_url" => "https://youtu.be/ohClxMmNLQQ?feature=shared"
            ],
            [
                "title" => "Borderlands 3",
                "description" => "A loot-driven first-person shooter with RPG elements, Borderlands 3 features the chaotic world of Pandora. Players choose from unique characters known as Vault Hunters and embark on a mission to stop the villainous Calypso twins while collecting tons of weapons and gear",
                "genres" => [1, 3], // Action, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/borderlands_3.jpg",
                "video_url" => "https://youtu.be/gjLQ2Uj4OPw?feature=shared"
            ],
            [
                "title" => "Final Fantasy VII Rebirth",
                "description" => "The highly anticipated continuation of Final Fantasy VII Remake, this game follows Cloud and his allies as they confront the forces of Shinra, explore deeper storylines, and uncover more of the secrets surrounding the world of Gaia. It's part of a multi-part remake of the original Final Fantasy VII.",
                "genres" => [1, 2, 3], // Action, Adventure, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/final_fantasy_vii.jpg",
                "video_url" => "https://youtu.be/utVE4aUKYuY?feature=shared"
            ],
            [
                "title" => "The Witcher 3: Wild Hunt",
                "description" => "A vast, open-world RPG set in a dark fantasy world. Players control Geralt of Rivia, a monster hunter, as he searches for his adopted daughter. The game is known for its deep story, complex characters, and a richly detailed world with quests that offer multiple choices and consequences.

",
                "genres" => [2, 1, 3], // Adventure, Action, RPG
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/wild_hunt.jpg",
                "video_url" => "https://youtu.be/XHrskkHf958?feature=shared"
            ],
            [
                "title" => "The Legend of Zelda: Breath of the Wild",
                "description" => "An open-world action-adventure game where players control Link, the hero, as he explores Hyrule to defeat Calamity Ganon. With an emphasis on exploration, puzzle-solving, and combat, Breath of the Wild reinvents the traditional Zelda formula, offering one of the most expansive and immersive worlds in gaming.",
                "genres" => [2], // Adventure
                "platforms" => [6], // Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/breath_of_the_wild.jpg",
                "video_url" => "https://youtu.be/zw47_q9wbBE?feature=shared"
            ],
            [
                "title" => "Grand Theft Auto V",
                "description" => "A highly popular open-world action-adventure game set in the fictional city of Los Santos. Players control three protagonists and engage in a mix of heists, exploration, driving, and combat, with an expansive single-player campaign and a highly active online multiplayer mode, GTA Online.",
                "genres" => [1, 2], // Action, Adventure
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/gta_v.jpg",
                "video_url" => "https://youtu.be/QkkoHAzjnUs?feature=shared"
            ],
            [
                "title" => "Portal 2",
                "description" => "A physics-based puzzle game where players solve complex puzzles using a portal gun that creates linked portals on surfaces. The sequel to the beloved Portal, Portal 2 builds on the original with a captivating story, witty humor, and innovative puzzles.",
                "genres" => [2, 5], // Adventure, Puzzle
                "platforms" => [1, 3, 4, 2, 5, 6], // PC, PS5, Xbox Series X/S, PS4, Xbox One, Nintendo Switch
                "image_url" => "http://u04-imdb-klon-tokaido-studios.test/images/games/portal_2.png",
                "video_url" => "https://youtu.be/A88YiZdXugA?feature=shared"
            ],
            [
                "title" => "Civilization VI",
                "description" => "A turn-based strategy game where players lead a civilization from the dawn of time to the future. Players make decisions about diplomacy, technology, culture, and military strategy to build the most powerful empire. Civilization VI introduces new mechanics like districts and city planning.",
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