<?php

namespace Database\Seeders;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            // Baldur's Gate 3, User 2
            [
                'title' => 'A Deep RPG Experience',
                'description' => 'Baldur’s Gate 3 grabbed me from the moment I stepped into its world. The characters are so rich and the choices you make feel weighty, like you\'re really crafting your own story. The D&D-based combat is deep but rewarding, and I love how every decision can lead to a completely different outcome.',
                'gameID' => 3,
                'userID' => 2,
            ],
            // Grand Theft Auto V, User 1
            [
                'title' => 'An Unmatched Open-World Adventure: Grand Theft Auto V',
                'description' => 'Grand Theft Auto V is an exhilarating open-world game with a captivating story, diverse characters, and endless possibilities for exploration. The ability to switch between three unique protagonists adds depth to the narrative, while the stunning visuals and immersive world make every moment feel alive. With a perfect blend of action, humor, and freedom, it\'s one of the best gaming experiences available.',
                'gameID' => 10,
                'userID' => 1,
            ],
            // Elden Ring, User 4
            [
                'title' => 'An Epic Fantasy Journey',
                'description' => "Elden Ring is a masterpiece that draws you into its vast, haunting world. The thrill of exploration, the challenge of tough bosses, and the sense of freedom you get to carve your own path—it's one of those games that stays with you long after you\'ve put the controller down.",
                'gameID' => 1,
                'userID' => 4,
            ],
            // The Legend of Zelda: Breath of the Wild, User 2
            [
                'title' => 'Freedom to Explore',
                'description' => 'Breath of the Wild is the definition of adventure. The world feels alive, and the freedom to explore and discover at your own pace is exhilarating. Whether you\'re climbing mountains or solving shrines, it never gets old. It’s an experience that makes you feel like a true adventurer.',
                'gameID' => 9,
                'userID' => 2,
            ],
            // Skyrim, User 5
            [
                'title' => 'An Immersive Fantasy World',
                'description' => 'Skyrim is the perfect game to lose yourself in. From slaying dragons to joining the Thieves Guild, every corner of its world offers something new. It’s one of those games that you’ll come back to time and time again because there’s always another story to discover.',
                'gameID' => 2,
                'userID' => 5,
            ],
            // Borderlands 3, User 5
            [
                'title' => 'Pure Chaotic Fun',
                'description' => 'If you want non-stop action with tons of humor, Borderlands 3 is your game. The world is wacky, the guns are wild, and the loot is endless. It’s the kind of game that doesn’t take itself too seriously and lets you just have a blast with friends.',
                'gameID' => 6,
                'userID' => 5,
            ],
            // The Witcher 3, User 2
            [
                'title' => 'Every Moment Feels Like a Legend',
                'description' => 'The Witcher 3 is hands down one of the most immersive games I’ve ever played. Geralt’s story is compelling, and the world around you feels alive. From monster hunts to moral dilemmas, it’s one of those games where you just have to keep playing because there’s always something new around the corner.',
                'gameID' => 8,
                'userID' => 2,
            ],
            // Civilization VI, User 4
            [
                'title' => 'Build Your Empire and Conquer History',
                'description' => 'Civilization VI is one of those games where you say, "I’ll just play for an hour"—and then six hours later, you’re still planning your next move. It’s a perfect balance of strategy, diplomacy, and managing your empire. Every decision feels important, and no two games are ever the same.',
                'gameID' => 12,
                'userID' => 4,
            ],
            // It Takes Two, User 1
            [
                'title' => 'An Emotional and Fun Co-Op Journey',
                'description' => 'Playing It Takes Two with a friend or partner is such a rewarding experience. It’s hilarious, emotional, and incredibly creative. The puzzles are perfectly designed to make you really work together, and the story of a couple trying to save their relationship is surprisingly touching.',
                'gameID' => 5,
                'userID' => 1,
            ],
            // Final Fantasy VII, User 6
            [
                'title' => 'An RPG That Stays With You Forever',
                'description' => 'Final Fantasy VII holds a special place in my heart. The story of Cloud, Aerith, and Sephiroth is unforgettable, and the emotional moments still hit hard every time. It’s the perfect mix of epic battles and personal drama, and the characters will always stick with you.',
                'gameID' => 7,
                'userID' => 6,
            ],
            // Portal 2, User 1
            [
                'title' => 'Smart, Funny, and Totally Unique',
                'description' => 'Portal 2 is a puzzle game that combines clever mechanics with a brilliant story and a ton of humor. The puzzles are challenging, but the real joy comes from the witty writing and the incredible world-building. I never thought a puzzle game could make me laugh so much.',
                'gameID' => 11,
                'userID' => 1,
            ],
            // Factorio, User 3
            [
                'title' => 'Building, Automating, and Losing Track of Time',
                'description' => 'Factorio is ridiculously addictive. At first, it seems like a simple game about factories, but the complexity grows as you get deeper into it. Once you start optimizing your production lines, it\'s hard to stop, and before you know it, hours have flown by.',
                'gameID' => 4,
                'userID' => 3,
            ],
        ];


        // Loop för att skapa recensionerna om de inte redan finns
        foreach ($reviews as $review) {
            Review::updateOrCreate(
                //letar efer review med samma title,user och spel
                [ 
                    'title' => $review['title'],
                    'userID' => $review['userID'],
                    'gameID' => $review['gameID'],
                ],
                [
                    'description' => $review['description'],
                ]
            );
        }
    }
}
