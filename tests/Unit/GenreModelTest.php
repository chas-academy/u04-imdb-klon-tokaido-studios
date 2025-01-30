<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenreModelTest extends TestCase {
    use RefreshDatabase; //Detta återställer databasen inför varje test i försäkran att det är en ren miljö

    public function testCreateGenres () {
        $genre = Genre::create(['name' => 'Action']); // Skapar en ny genre med namnet 'Action' och sparar den i databasen
        
        $this->assertDatabaseHas('genres', ['name' => 'Action']); // Verifierar att databasen innehåller en post med namnet 'Action'
    }
}