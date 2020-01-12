<?php

/** @var Factory $factory */

use App\Model;
use App\Model\BlogPost;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(BlogPost::class, static function (Faker $faker) {
    $title = $faker->sentences(1, true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = random_int(1, 5) > 1;

    $data = [
        'category_id' => random_int(1, 11),
        'user_id' => (random_int(1, 5) == 5) ? 1 : 2,
        'title' => $title,
        'slug'  => Str::slug($title),
        'excerpt' => $faker->text(rand(40,100)),
        'content_raw' => $txt,
        'content_html' => $txt,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('2 mounts', '1 days') : null,
    ];
    return $data;
});
