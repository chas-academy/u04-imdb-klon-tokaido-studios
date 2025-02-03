<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testUserLogin()
    {
        $user = User::factory()->create(); // Skapar användare med factory

        $response = $this->actingAs($user) // Loggar in användaren med följande funktion
                        ->get(route('users.profile'));

        $response->assertStatus(200) // Verifierar att sidan svarar med 200/OK. 
                ->assertViewIs('users.profile')
                ->assertSee($user->name);
    }

    public function testUserLogout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                        ->post(route('logout')); // Skickar POST-förfrågan till logout

        $response->assertRedirect('/'); // Dirigerar om till startsidan
        $this->assertGuest(); // Verifierar utloggad status
    }

    public function testUserUpdateProfile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put(route('profile.update'), [ // PUT-förfrågan till profile.update, säkerställer nya uppgifter
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect(route('profile.edit')); // Dirigerar till profile.edit vid uppdatering
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated Name']); // Kontrollerar att databasen har den uppdaterade användaren
    }

    public function testUserDeleteAcc()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'), // Säkerställ att lösenordet är hashat
        ]);
    
        $response = $this->actingAs($user)->delete(route('profile.destroy'), [
            'current_password' => 'password', // Laravel kräver 'current_password' istället för 'password'
        ]);
    
        $response->assertRedirect('/');
        $this->assertDatabaseMissing('users', ['id' => $user->id]); // Verifierar att användaren är borttagen
    }
}
