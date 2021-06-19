<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use app\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    // It took me a while to figure out that these
    // functions should start with the wordt 'test',
    // or use the prefix '@test'...
    /**
     * @test
     */
    public function test_register_user_success()
    {
        $requestData = [
          'email' => 'e@e.er',
          'name' => 'jan',
          'password' => '1234567890',
        ];

        $response = $this
          ->postJson('/api/register', $requestData)
          ->assertCreated();
    }

    public function test_register_user_fail()
    {
        $requestData = [
          'email' => 'e@e.er',
          'name' => 'jan',
          'password' => '1',
        ];

        $response = $this
          ->postJson('/api/register', $requestData)
          ->assertJsonValidationErrors(['password']);
    }

    public function test_login_user_success()
    {
        $user = User::factory()->create([
          'password' => Hash::make($password = '1234567890')
        ]);

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => $password,
        ])->assertOk();
    }

    public function test_login_user_fail()
    {
        $user = User::factory()->create([
          'password' => Hash::make($password = '1234567890')
        ]);

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => '123456789',
        ])->assertStatus(401);
    }
}
