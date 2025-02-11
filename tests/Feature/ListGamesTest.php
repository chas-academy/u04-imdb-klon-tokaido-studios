<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListGamesTest extends TestCase {
    use RefreshDatabase;

    public function testListAllGames() {
        $genre1 = Genre::create(['name' => 'Action']);
        $genre2 = Genre::create(['name' => 'RPG']);

        $game1 = Game::create([
            'title' => 'Test Game 1',
            'description' => 'Beskrivning av Test Game 1',
            'image' => 'https://example.com/game1.jpg',
            'trailer' => 'https://example.com/game1_trailer.mp4',
        ]);
        $game1->genres()->attach($genre1);
        
        $game2 = Game::create([
            'title' => 'Test Game 2',
            'description' => 'Beskrivning av Test Game 2',
            'image' => 'https://example.com/game2.jpg',
            'trailer' => 'https://example.com/game2_trailer.mp4',
        ]);
        $game2->genres()->attach($genre2);

        $response = $this->get(route('games.index'));

        $response->assertStatus(200);

        $response->assertSee($game1->title);
        $response->assertSee($game2->title);

        $response->assertSee($game1->description);
        $response->assertSee($game2->description);
    }
}