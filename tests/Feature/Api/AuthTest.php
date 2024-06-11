<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_login_a_user_via_api()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure(['token']);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function it_returns_an_error_if_credentials_are_invalid()
    {
        $response = $this->postJson('/api/login',[
            'email' => 'invalid@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(401);

        $response->assertJsonStructure(['error']);
    }
}