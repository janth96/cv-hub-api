<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_get_user_details_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
          ->get('/api/user')
          ->assertJsonStructure([
            'user' => [
              'name',
              'email',
            ]
          ])
          ->assertOk();
    }

    public function test_update_user_details_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
          ->patch('/api/user', [
            'job_title' => 'Assistent',
          ])->assertOk();
    }
}
