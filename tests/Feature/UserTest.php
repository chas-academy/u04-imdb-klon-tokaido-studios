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

    /**
     * ADMIN-TESTER
     */

    /**
     * Testar att adminpanelen är åtkomlig för en inloggad användare.
     */
    public function testAdminDashboardAccess()
    {
        $admin = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('users.profile'); // Dubbelkolla att detta är rätt vy.
    }

    /**
     * Testar att en admin kan se indexsidan med data.
     */
    public function testAdminViewIndex()
    {
        $admin = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($admin)->get(route('admin.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }

    /**
     * Testar att admin kan öppna skapa-sida.
     */
    public function testAdminAccessCreatePage()
    {
        $admin = User::factory()->create(['isAdmin' => true]);

        $response = $this->actingAs($admin)->get(route('admin.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.create');
    }

    /**
     * Testar att admin kan skapa en ny post.
     */
    public function testAdminStoreNewPost()
    {
        $admin = User::factory()->create(['isAdmin' => true]);

        $postData = ['name' => 'Test Post']; // Skapar testdata för en ny post

        $response = $this->actingAs($admin)->post(route('admin.store'), $postData);

        $response->assertRedirect(route('admin.dashboard'));
        $response->assertSessionHas('success', 'Post skapades!');
    }
}