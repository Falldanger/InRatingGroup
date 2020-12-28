<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
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

$factory->defineAs(Post::class, 'post', function (Faker $faker) {

    $imageId = rand(1, 100);
    return [
        'author_id' => rand(1, 20),
        'image_id' => ($imageId % 3 != 0) ? $imageId : null,
        'content' => $faker->text(rand(200, 1000)),
    ];
});

