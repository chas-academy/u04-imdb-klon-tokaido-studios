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

    /**
     * REGISTERINGSTEST 
     * */

    /**
     * Testar att en användare kan registrera sig korrekt.
     */
    public function testUserRegistration()
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

    /**
     * Testar att e-postadressen måste vara i rätt format.
     */
    public function testValidEmail()
    {
        $userData = [
            'email' => 'invalid-email',
            'password' => 'password123',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Testar att en e-postadress måste vara unik.
     */
    public function testEmailUnique()
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

    /**
     * Testar att lösenordet måste vara minst 8 tecken långt.
     */
    public function testRegPassMinLength()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'short',
            'username' => 'testuser',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password');
    }

    /**
     * Testar att användarnamnet måste vara minst 5 tecken.
     */
    public function testRegUsernameMinLength()
    {
        $userData = [
            'email' => 'test@example.com',
            'password' => 'password123',
            'username' => 'abc',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('username');
    }

    /**
     * Testar att lösenordet är korrekt hashat.
     */
    public function testPassCorrectHash()
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

