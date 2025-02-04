<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;
use App\Models\Genre;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function testDisplaysGames()
    {
        $game = Game::factory()->create();
        // Skapar ett nytt spel via storeGame(), testar validering och att spelet sparas korrekt i databasen.

        $response = $this->get(route('games.index'));
        // Hämtar alla spel via index() och kontrollerar att rätt vy returneras.

        $response->assertStatus(200);
        $response->assertViewIs('games.index');
        $response->assertSee($game->title);
    }

    public function testSearchGame()
    {
        $game = Game::factory()->create(['title' => 'Test Game']);

        $response = $this->get(route('games.search', ['title' => 'Test']));

        $response->assertStatus(200);
        $response->assertViewIs('games.search');
        $response->assertSee('Test Game');
        // Söker efter spel med search() och verifierar att sökresultatet är korrekt.
    }

    public function testDisplayGenres()
    {
        $genre = Genre::factory()->create();

        $response = $this->get(route('genres.index'));

        $response->assertStatus(200);
        $response->assertViewIs('genres.index');
        $response->assertSee($genre->name); // Kontrollerar om t.ex. "Action" finns i svaret
    }

    public function testShowGenres()
    {
        $genre = Genre::factory()->create();
        $game = Game::factory()->create();
        $genre->games()->attach($game);

        $response = $this->get(route('genres.games', $genre->id));
        // Hämtar alla genrer via index() och kontrollerar att rätt vy returneras.

        $response->assertStatus(200);
        $response->assertViewIs('genres.games');
        $response->assertSee($game->title);
        // Hämtar alla spel för en viss genre via showGames() och verifierar att rätt spel returneras.
    }
}
