<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->defineAs(Comment::class, 'comment', function (Faker $faker) {

    return [
        'post_id' => rand(1, 25),
        'commentator_id' => rand(1, 20),
        'content' => $faker->text(rand(10, 100)),
    ];
});

