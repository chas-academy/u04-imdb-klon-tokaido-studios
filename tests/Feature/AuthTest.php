<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testUserLogin()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->get(route('users.profile'));

        $response->assertStatus(200);
    }

    public function testUserLogout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->post(route('logout'));

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    public function testUserUpdateProfile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put(route('profile.update'), [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect(route('profile.edit'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    public function testUserDeleteAcc()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('profile.destroy'), [
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
