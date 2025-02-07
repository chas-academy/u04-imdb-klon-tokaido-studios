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
            'password' => 'password123', // Lösenordet kommer hashas i databasen
            'country' => 'Sweden',
            'isAdmin' => false,
        ];

        $response = $this->post('/registerNewUser', $userData);
        
        // Kontrollerar att användaruppgifter sparas i databasen
        $this->assertDatabaseHas('users', [
            'username' => $userData['username'],
            'email' => $userData['email'],
            'country' => $userData['country'],
            'isAdmin' => $userData['isAdmin'],
        ]);

        // Kontrollerar att lösenordet inte är lagrat som rent text
        $user = User::where('email', $userData['email'])->first();
        $this->assertNotEquals($user->password, $userData['password']); // Lösenordet ska vara hashat
    }
}