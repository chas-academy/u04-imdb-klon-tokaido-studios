<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserProfileTest extends TestCase {
    use RefreshDatabase;

    public function testUserViewProfile() {
        // Skapar manuellt en användare
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = Hash::make('password123');
        $user->country = 'Sweden';
        $user->isAdmin = false;
        $user->save();

        //Loggar in användaren
        $this->actingAs($user);

        $response = $this->get(route('users.profile'));
        $response->assertStatus(200); //Säkerställer rätt HTTP-statuskod
        $response->assertSee($user->username); // Kontrollerar att användarens data visas på sidan, till exempel användarnamn
        $response->assertSee($user->email); // Samma med email
    }
}