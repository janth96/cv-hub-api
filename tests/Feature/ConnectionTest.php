<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConnectionTest extends TestCase
{
    public function test_connection()
    {
        $response = $this->get('/api/ping');

        $response->assertOk();
    }
}
