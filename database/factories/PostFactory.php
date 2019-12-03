<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'body' => $faker->text(999),
        'img' => $faker->imageUrl(750,300,'business'),
        'autor_id' =>$faker->randomDigitNotNull
    ];
});
