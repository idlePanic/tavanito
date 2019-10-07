<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $tags = json_encode([
        'tag' => [$faker->title, $faker->title]
    ]);
    return [
        'title' => $faker->title,
        'body' => $faker->sentence,
        'tags' => $tags,
    ];
});
