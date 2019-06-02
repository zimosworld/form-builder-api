<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\TextArea;
use Faker\Generator as Faker;

$factory->define(TextArea::class, function (Faker $faker) {
    return [
        'max_characters' => 255,
        'rows' => rand(1, 5)
    ];
});
