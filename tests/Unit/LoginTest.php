<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;  // This trait resets the database after each test

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Arrange
        // Create a new user in the database using the User factory
        $user = User::factory()->create([
            'password' => Hash::make($password = 'password'),  // Hash the password
        ]);

        // Act
        // Simulate a post request to the login route
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,  // The password is 'password' as defined above
        ]);


        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(RouteServiceProvider::HOME);  // Replace 'home' with your post-login route
    }
}
