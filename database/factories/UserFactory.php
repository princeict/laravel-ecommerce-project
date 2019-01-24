<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {

    return [
        'categoryName' => $faker->name,
        'categoryDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});

$factory->define(App\Manufacturer::class, function (Faker $faker) {

    return [
        'ManufacturerName' => $faker->word,
        'ManufacturerDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {

    return [
        'productName' => $faker->name,
        'categoryDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});