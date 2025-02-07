<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCreationTest extends TestCase {

    use RefreshDatabase;

    public function testCreateAUser()
    {
        $userData = [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'country' => 'Sweden',
            'isAdmin' => false,
        ];

        $response = $this->post('/registerNewUser', $userData);

        $this->assertDatabaseHas('users', [
            'username' => $userData['username'],
            'email' => $userData['email'],
            'country' => $userData['country'],
            'isAdmin' => $userData['isAdmin'],
        ]);

        $user = User::where('email', $userData['email'])->first();
        $this->assertNotEquals($user->password, $userData['password']);
    }
}