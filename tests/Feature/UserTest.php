<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UserTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('avatars');
        $this->payload = [
            "first_name" => "ahmed",
            "last_name" => "ahmed",
            "country_code" => "eg",
            "phone_number" => "+201000000",
            "gender" => "male",
            "birthdate" => "2020-06-25",
            "email" => "test@test.test",
            "password" => "password",
            "avatar" => UploadedFile::fake()->image('avatar.jpg')
        ];
    }

    /**
     * @return void
     */
   public function testCreate()
    {
        $this->json('post', '/api/user', $this->payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "id",
                    "first_name",
                    "last_name",
                    "country_code",
                    "phone_number",
                    "gender",
                    "birthdate",
                ],
            ]);
    }

    /**
     * @return void
     */
   public function testInvalidPhoneFormat()
    {
        $payload = $this->payload;

        $payload['phone_number'] = '201000000';

        $this->json('post', '/api/user', $payload)
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "phone_number" => [
                        "invalid"
                    ]
                ]
            ]);
    }
}
