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
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'activated' => 1
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
		'body' => $faker->realtext(1000),
		'category_id' => rand(1,5),
    	'user_id' => rand(1,10)
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
		'body' => $faker->realtext(250),
		'post_id' => rand(1,50),
    	'user_id' => rand(1,10)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
		'description' => $faker->realtext(500)
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {
    return [
        'rating' => rand(1,5),
		'post_id' => rand(1,50),
    	'user_id' => rand(1,10)
    ];
});

