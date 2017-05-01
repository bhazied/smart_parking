<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(App\Model\Country::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->unique()->country,
        'code' => $faker->unique()->countryCode,
        'long_code' => $faker->unique()->country,
        'prefix' => str_random(2),
        'picture' => $faker->image()
    ];
});


$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'country_id' => 2
    ];
});
