<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserList;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testar att användarens profil är åtkomlig.
     */
    public function testUserProfileAccessible()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get(route('users.profile'));
        
        $response->assertStatus(200); // Kontrollerar att sidan laddas korrekt
        $response->assertViewIs('users.profile'); // Verifierar att rätt vy används
        $response->assertSee($user->name); // Säkerställer att användarens namn visas
    }

    /**
     * Testar att användarens listor visas korrekt.
     */
    public function testUserListsDisplayed()
    {
        $user = User::factory()->create();
        $list = UserList::factory()->create(['userID' => $user->id]);

        $response = $this->actingAs($user)->get(route('user.lists'));

        $response->assertStatus(200); // Kontrollerar att sidan laddas korrekt
        $response->assertViewIs('Userlist.index'); // Verifierar att rätt vy används
        $response->assertSee($list->listname); // Säkerställer att listnamnet visas
    }
}

