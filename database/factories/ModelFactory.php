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
        'job' => $faker->jobTitle,
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
        'page_img' => mt_rand(1, 3) . '.jpg',
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
    $icons = [ 'fa-group', 'fa-fire', 'fa-database', 'fa-flag', 'fa-flask', 'fa-glass', 'fa-leaf', 'fa-eye', 'fa-cube', 'fa-road' ];
    return [
        'name' => $faker->word,
        'icon' => $icons[array_rand($icons, 1)],
        'description' => $faker->sentence,
    ];
});
