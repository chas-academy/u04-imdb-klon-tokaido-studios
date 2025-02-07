<?php

namespace Test\Feature;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateReviewTest extends TestCase {
    use RefreshDatabase;

    public function userGameReview() {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = bcrypt('password');
        $user->country = 'Sweden';
        $user->isAdmin = false;
        $user->save();

        $this->actingAs($user);

        $game = new Game();
        $game->title = 'Test Game';
        $game->description = 'This is a test game.';
        $game->save();

        $reviewData = [
            'title' => 'Testrecension Namn',
            'description' => 'Test-beskrivning för recension',
            'gameID' => $game->gameID,
        ];

        $response = $this->post(route('reviews.store'), $reviewData);
        $response->assertRedirect(route('reviews.game_review', $game->gameID));

        $this->assertDatabaseHas('reviews', [
            'Title' => $reviewData['Title'],
            'description' => $reviewData['description'],
            'gameID' => $reviewData['gameID'],
            'userID' => $user->userID,
        ]);
    }

    public function userCantReviewWithoutTitleOrDesc() {

        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = bcrypt('password');
        $user->country = 'Sweden';
        $user->isAdmin = false;
        $user->save();

        $this->actingAs($user);

        $game = new Game();
        $game->title = 'Test Game';
        $game->description = 'This is a test game.';
        $game->save();

        $response = $this->post(route('reviews.store'), [
            'description' => 'This is a test description for the review.',
            'gameID' => $game->gameID,
        ]);

        $response->assertSessionHasErrors('Title');
        
        $response = $this->post(route('reviews.store'), [
            'Title' => 'Test Review Title',
            'gameID' => $game->gameID,
        ]);

        $response->assertSessionHasErrors('description');
    }
}