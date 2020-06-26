<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = factory(\App\User::class, 1)->create();
        $token = $user->first()->api_token;
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('post', '/api/user/status', [
            "status" => "test",
        ], $headers)
        ->assertStatus(201)
        ->assertJsonStructure([
            "id",
            "status",
            "user_id",
            "updated_at",
            "created_at",
        ]);
    }
}
