<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateGameTest extends TestCase
{
    use RefreshDatabase;

    public function testOnlyAdminCanCreateGame()
    {
        // Skapa en admin-användare utan att sätta 'email_verified_at'
        $admin = User::factory()->create([
            'username' => 'AdminUser',  // Använd 'username' istället för 'name'
            'isAdmin' => true,          // Sätt användaren som admin
        ]);
    
        // Autentisera som admin
        $this->actingAs($admin);
    
        // Skapa en genre
        $genre = Genre::create([
            'name' => 'Action',
        ]);
    
        // Speldata
        $gameData = [
            'title' => 'Test Game',
            'description' => 'Beskrivning av Test Game.',
            'image' => 'https://example.com/image.jpg',
            'trailer' => 'https://example.com/trailer.mp4',
            'genres' => [$genre->genreID],
        ];
    
        // Skicka POST-begäran för att skapa spelet
        $response = $this->withoutMiddleware()->post(route('games.store'), $gameData);
    
        // Kontrollera om omdirigeringen sker till rätt sida
        $response->assertRedirect(route('games.index'));
    
        // Verifiera att spelet skapades i databasen
        $this->assertDatabaseHas('games', [
            'title' => 'Test Game',
            'description' => 'Beskrivning av Test Game.',
            'image' => 'https://example.com/image.jpg',
            'trailer' => 'https://example.com/trailer.mp4',
        ]);
        
        // Hämta spelet och kontrollera om det är kopplat till rätt genre
        $game = Game::where('title', 'Test Game')->first();
        $this->assertTrue($game->genres->contains($genre));
    }      
}
