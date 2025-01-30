<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Genre;
use Tests\TestCase;

class GenreTest extends TestCase {
    use RefreshDatabase; //Detta återställer databasen inför varje test i försäkran att det är en ren miljö

    public function testGetAllGenres () {

        Genre::factory()->count(3)->create(); //Skapar tre genre-poster mha en factory

        $response = $this->get('/api/genres'); //Skickar GET-förfrågan, hämtar alla genrer

        $response->assertStatus(200) // Kontrollerar att svaret har status 200 (OK)...
                ->assertJsonCount(3); // ...och innehåller exakt 3 genrer
    }

    public function testUnathDenied() { //Icke-auktoriserad användare får alltså ej skapa ny genre
    $response = $this->post('/api/genres', ['name' => 'RPG']);

    $response->assertStatus(403); // Förväntat: förbjudet

}

}

