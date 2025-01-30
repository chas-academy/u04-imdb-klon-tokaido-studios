<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class GenreTest extends TestCase {
    use RefreshDatabase; //Detta återställer databasen inför varje test i försäkran att det är en ren miljö

    public function testGetAllGenres () {

        // Skapa några genrer i databasen
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Adventure']);
        Genre::create(['name' => 'RPG']);

        // Hämta alla genrer från databasen med en MySQL-fråga
        $genres = DB::table('genres')->get();

        // Kontrollera att vi har 3 genrer i databasen
        $this->assertCount(3, $genres);

        // Kontrollera att databasen innehåller specifika genrer
        $this->assertTrue($genres->contains('name', 'Action'));
        $this->assertTrue($genres->contains('name', 'Adventure'));
        $this->assertTrue($genres->contains('name', 'RPG'));
    }

    public function testUnathDenied() { //Icke-auktoriserad användare får alltså ej skapa ny genre
    $response = $this->post('/api/genres', ['name' => 'RPG']);

    $response->assertStatus(403); // Förväntat: förbjudet
    }
}

