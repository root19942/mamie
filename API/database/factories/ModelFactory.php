<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Recette;
use App\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => rand(0, 300),
        'description'=>$faker->text,
        'picture'=> "https://picsum.photos/200/300?random=".rand(1, 300),
    ];
});

$factory->define(Recette::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dificulte' => rand(0, 10),
        'recette'=>$faker->text(2500),
    ];
});

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//     ];

