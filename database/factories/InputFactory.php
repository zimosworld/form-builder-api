<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Input;
use Faker\Generator as Faker;

$factory->define(Input::class, function (Faker $faker) {
    return [
        'max_characters' => 255,
        'placeholder' => $faker->realText(20)
    ];
});
