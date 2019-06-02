<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Select;
use Faker\Generator as Faker;

$factory->define(Select::class, function (Faker $faker) {
    return [
        'choices' => json_encode(explode(' ', $faker->words(4, true))),
        'default' => '',
    ];
});
