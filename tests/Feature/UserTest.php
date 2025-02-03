<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserList;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreateList()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('user.lists.store'), [
            'listname' => 'Test List',
            'description' => 'Test description',
        ]);

        $response->assertRedirect(route('user.lists'));
        $this->assertDatabaseHas('user_lists', ['listname' => 'Test List']);
    }

    public function testAccessibleProfile()
    {
        $user = User::factory()->create(); // Skapar användare via factory
        
        $response = $this->actingAs($user)->get(route('users.profile'));
        // Loggar in användaren och skickar en GET-förfrågan till users.profile
        
        $response->assertStatus(200); // Kontrollerar att svaret har status 200/OK.
        $response->assertViewIs('users.profile'); // Ser till att returnera rätt view.
        $response->assertSee($user->name); // Verifierar att användarens namn visas på profilsidan.
    }

    public function testUserListsDisplayed()
    {
        $user = User::factory()->create();
        $list = UserList::factory()->create(['userID' => $user->id]);
        // Skapar en användare och en lista som tillhör användaren.

        $response = $this->actingAs($user)->get(route('user.lists'));

        $response->assertStatus(200);
        $response->assertViewIs('Userlist.index');
        $response->assertSee($list->listname);
    }
}