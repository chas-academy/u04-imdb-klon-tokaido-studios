<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserProfileTest extends TestCase {
    use RefreshDatabase;

    public function testUserViewProfile() {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = Hash::make('password123');
        $user->country = 'Sweden';
        $user->isAdmin = false;
        $user->save();

        $this->actingAs($user);

        $response = $this->get(route('profile.edit'));
        $response->assertStatus(200);
        $response->assertSee($user->username);
        $response->assertSee($user->email);
    }
}