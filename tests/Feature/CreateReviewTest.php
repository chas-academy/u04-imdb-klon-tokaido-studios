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
        $response = $this->post(route('reviews.store'), $reviewData);

        // Omdirigerar till spelets recensioner
        $response->assertRedirect(route('reviews.game_review', $game->gameID));

        // Kontrollerar att recensionen finns i databasen
        $this->assertDatabaseHas('reviews', [
            'Title' => $reviewData['Title'],
            'description' => $reviewData['description'],
            'gameID' => $reviewData['gameID'],
            'userID' => $user->userID,
        ]);
    }

    public function testUserCantReviewWithoutTitleOrDescription()
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

        // Försöker att skapa en recension utan titel
        $response = $this->post(route('reviews.create', $game->gameID), [
            'description' => 'This is a test description for the review.',
            'gameID' => $game->gameID,
        ]);

        // Kontrollerar att det finns fel för 'Title'
        $response->assertSessionHasErrors('Title');

        // Försöker att skapa en recension utan beskrivning
        $response = $this->post(route('reviews.create', $game->gameID), [
            'Title' => 'Test Review Title',
            'gameID' => $game->gameID,
        ]);

        // Kontrollerar att det finns fel för 'description'
        $response->assertSessionHasErrors('description');
    }
}
