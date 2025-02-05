<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserList;
use Illuminate\Support\Facades\Hash;

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

    // REGISTERINGSTEST

    public function test_user_can_register_successfully()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('success', 'Kontot har skapats!');

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'username' => 'testuser',
        ]);
    }

    public function test_registration_requires_valid_email()
    {
        $userData = [
            'email' => 'invalid-email',
            'password' => 'password123',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('email');
    }

    public function test_registration_requires_unique_email()
    {
        User::factory()->create(['email' => 'test@example.com']);

        $userData = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('email');
    }

    public function test_registration_requires_password_min_length()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'short',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password');
    }

    public function test_registration_requires_username_length()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'username' => 'abc',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('username');
    }

    public function test_password_is_hashed_correctly()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'username' => 'testuser',
        ];

        $this->post(route('register'), $userData);

        $user = User::where('email', 'test@example.com')->first();

        $this->assertTrue(Hash::check('password123', $user->password));
    }
}

