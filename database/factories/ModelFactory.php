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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'gender' => mt_rand(1,3),
        'phone' => $faker->phoneNumber,
        'avatar' => 'avatar'. mt_rand(1,5) . '.png',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => join(' ', $faker->words),
        'summary' => $faker->sentence,
        'content' => $faker->text,
        'source' => $faker->safeEmailDomain,
        'provider' => $faker->name,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});

$factory->define(App\Slider::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'img' => 'http://temp.im/400x150',
        'link' => '/article/'. mt_rand(1, 33)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});
