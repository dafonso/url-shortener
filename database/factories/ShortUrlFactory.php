<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShortUrl;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ShortUrl::class, function (Faker $faker) {
    return [
        'code' => Str::random(6),
        'target_url' => $faker->url,
        'access_token' => Str::random(60),
        'clicks' => 0,
        'user_id' => 0,
        //
    ];
});
