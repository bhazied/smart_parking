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

/**
 * Create model factory for geolocation ( country, state, region )
 */

$factory->define(App\Model\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->country,
        'code' => $faker->unique()->countryCode,
        'long_code' => $faker->unique()->country,
        'prefix' => str_random(2),
        'picture' => $faker->image()
    ];
});


$factory->define(App\Model\Region::class, function (Faker\Generator $faker) {
    $regions = ['Sahel', 'Nord', 'Milieu', 'Sud', 'Sud wedt'];
    return [
        'name' => $regions[rand(0, 4)],
        'creator_user_id' => 1,
    ];
});

$factory->define(App\Model\State::class, function (Faker\Generator $faker) {
    $states = ['Tunis', 'Sousse', 'Nabeul', 'Kassrine', 'Tataouine', 'Beja', 'Ariana', 'Mannouba', 'Bizerte', 'Touzer'];
    return [
        'name' => $states[rand(0, 9)],
        'creator_user_id' => 1
    ];
});

/**
 *Create Car Model factory
 */
$factory->define(App\Model\Car::class, function (Faker\Generator $faker) {
    return [
        'registration' => $faker->unique()->numerify('####TUN###'),
        'creator_user_id' => 1
    ];
});

$factory->define(App\Model\CarBody::class, function (Faker\Generator $faker) {
    $carBody = ['Citadine', 'Compacte', 'Berline', 'Coupe', 'Cabriolet', 'SUV', 'Monospace', 'Utilitaire', 'Pickup'];
    $i = 0;
    return [
        'name' => $faker->unique()->numerify('###-'.$carBody[rand(0, 8)]),
        'creator_user_id' => 1
    ];
});
$factory->define(App\Model\CarBrand::class, function (Faker\Generator $faker) {
    $carBrand = ['Citroen','Renault','Volswagen','Marcedes-Benz','BMW','Ford', 'Nissan'];
    $i=0;
    return [
        'name' => $faker->unique()->numerify('###-'.$carBrand[rand(0, 6)]),
        'creator_user_id' => 1
    ];
});
$factory->define(App\Model\CarModel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->numerify('###-Model'),
        'creator_user_id' => 1
    ];
});
