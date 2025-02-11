<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateReviewTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanCreateGameReview()
    {
        // Skapar manuellt en användare
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = bcrypt('password');
        $user->country = 'Sweden';
        $user->isAdmin = false;
        $user->save();

        // Loggar in användaren
        $this->actingAs($user);

        // Skapar ett spel
        $game = new Game();
        $game->title = 'Test Game';
        $game->description = 'This is a test game.';
        $game->save();

        // Recensionsdata
        $reviewData = [
            'Title' => 'Testrecension Namn',
            'description' => 'Test-beskrivning för recension',
            'gameID' => $game->gameID,
        ];

        // Skickar POST-begäran för att skapa recensionen via den korrekta rutten
        // Här kringgår vi alla middleware
        $response = $this->withoutMiddleware()
                        ->post(route('reviews.store'), $reviewData);

        // Kollar om vi får en redirect. Om det är 500 fel, kommer felmeddelandet att synas här.
        $response->assertStatus(302); // 302 är för redirection
        $response->assertRedirect(route('reviews.game_review', $game->gameID));

        // Kontrollerar att recensionen finns i databasen
        $this->assertDatabaseHas('reviews', [
            'Title' => $reviewData['Title'],
            'description' => $reviewData['description'],
            'gameID' => $reviewData['gameID'],
            'userID' => $user->userID,
        ]);
    } 
}
