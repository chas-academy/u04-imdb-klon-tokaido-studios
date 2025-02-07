<?php

namespace tests\Feature\Auth;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewTests extends TestCase {

    use RefreshDatabase;

    public function testCreateAGame() {
        $genre = Genre::create([
            'name' => 'Action',
        ]);

        $gameData = [
            'title' => 'Test Game',
            'description' => 'Beskrivning av Test Game.',
            'image' => 'https://example.com/image.jpg',
            'trailer' => 'https://example.com/trailer.mp4',
            'genres' => [$genre->genreID],
        ];
        
        $response = $this->withoutMiddleware()->post(route('games.store'), $gameData);
        
        $response->assertRedirect(route('games.index'));

        $this->assertDatabaseHas('games', [
            'title' => 'Test Game',
            'description' => 'Beskrivning av Test Game.',
            'image' => 'https://example.com/image.jpg',
            'trailer' => 'https://example.com/trailer.mp4',
        ]);

        $game = Game::where('title', 'Test Game')->first();
        $this->assertTrue($game->genres->contains($genre));
    }
}