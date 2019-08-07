<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'last_name2' => $faker->lastName,
        'curp' => ucwords($faker->lexify('????').$faker->numerify('######').$faker->lexify('??????').$faker->numerify('##')),
        'city' => $faker->city,
        'state' => $faker->state,
        'address' => $faker->streetAddress,
        'phone' => $faker->numerify('##########'),
        'email' => $faker->unique()->safeEmail,
        'level' => 1,
        'password' => '123456', // se encrypta mediante un mutator de modelo User
        'remember_token' => Str::random(10),
    ];
});
