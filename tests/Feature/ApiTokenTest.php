<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTokenTest extends TestCase
{

    /**
     * @return void
     */
   public function testCreate()
    {
        factory(\App\User::class, 1)->create();

        $this->json('post', '/api/api-token/generate', [
            "phone_number" => "+201000000",
            "password" => "password"
        ])
        ->assertStatus(201)
        ->assertJsonStructure([
            "auth-token"
        ]);
    }

    /**
     * @return void
     */
   public function testCreateForNotExistingUser()
    {
        factory(\App\User::class, 1)->create();

        $this->json('post', '/api/api-token/generate', [
            "phone_number" => "+201044444",
            "password" => "password"
        ])
        ->assertStatus(404);
    }
}
