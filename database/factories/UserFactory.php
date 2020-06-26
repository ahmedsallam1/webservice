<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        "first_name" => "ahmed",
        "last_name" => "ahmed",
        "country_code" => "eg",
        "phone_number" => "+201000000",
        "gender" => "male",
        "birthdate" => "2020-06-25",
        "email" => "test@test.test",
        "password" => Hash::make('password'),
        "avatar" => 'avatar.jpg',
        "api_token" => Str::random(60),
    ];
});
