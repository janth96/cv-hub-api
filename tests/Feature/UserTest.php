<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_user_details_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
          ->get('/api/user')
          ->assertJsonStructure([
            'user' => [
              'name',
              'email',
              'job_title',
              'phone_number',
              'linkedin_url',
              'github_url',
              'website_url',
            ]
          ])->assertOk();
    }

    public function test_update_user_details_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
          ->patchJson('/api/user', [
            'job_title' => 'Assistent',
            'phone_number' => '783248943',
            'linkedin_url' => 'https://laravel.com/docs/8.x/http-tests',
            'github_url' => 'https://laravel.com/docs/8.x/http-tests',
            'website_url' => 'https://laravel.com/docs/8.x/http-tests',
          ])->assertOk();
    }
}
