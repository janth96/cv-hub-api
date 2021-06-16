<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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

    public function test_connection()
    {
      $response = $this->json('GET', '/api/ping');

      $response->assertJsonValidationErrors();
    }
}
