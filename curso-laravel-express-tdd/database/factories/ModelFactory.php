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

$factory->define(laravel_express\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

    $factory->define(laravel_express\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
    ];
    });

    $factory->define(laravel_express\Comment::class, function (Faker\Generator $faker) {
        return [
            'post_id' => mt_rand(1, 15),
            'comment' => $faker->paragraph,
            'name' => str_random(10),
            'email' => str_random(10),
            ];    
    });

    $factory->define(laravel_express\Tag::class, function (Faker\Generator $faker) {
        return [
            'name' => $faker->word
            ];    
    });