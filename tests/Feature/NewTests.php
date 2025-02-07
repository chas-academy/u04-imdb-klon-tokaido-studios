<?php

namespace tests\Feature\Auth;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewTests extends TestCase {

    use RefreshDatabase;

    public function testCreateAGame() {

        // Skapar genre manuellt
        $genre = Genre::create([
            'name' => 'Action',
        ]);

        // Skapa uppgifter för spelet
        $gameData = [
            'title' => 'Test Game',
            'description' => 'Beskrivning av Test Game.',
            'image' => 'https://example.com/image.jpg',
            'trailer' => 'https://example.com/trailer.mp4',
            'genres' => [$genre->genreID],
        ];

        // Inaktiverar CSRF-skydd/middleware i syfte för detta test
        $response = $this->withoutMiddleware()->post(route('games.store'), $gameData);

        // Ser till att omdirigering sker till dit den ska
        $response->assertRedirect(route('games.index'));

        // Ser till att spelet har skapats i databasen
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