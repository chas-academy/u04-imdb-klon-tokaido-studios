<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Game;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreateReview()
    {
        $user = User::factory()->create();
        $game = Game::factory()->create();

        $response = $this->actingAs($user)->post(route('reviews.store'), [
            'Title' => 'Great Game',
            'description' => 'This game is amazing!',
            'gameID' => $game->id
        ]);

        $response->assertRedirect(route('reviews.game_review', $game->id));
        $this->assertDatabaseHas('reviews', ['Title' => 'Great Game']);
    }

    public function testUserDeleteReview()
    {
        $user = User::factory()->create();
        $review = Review::factory()->create(['userID' => $user->id]);

        $response = $this->actingAs($user)->delete(route('reviews.delete', $review->id));

        $response->assertRedirect(route('users.reviews', $review->gameID));
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }
}
