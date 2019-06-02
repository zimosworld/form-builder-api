<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Form;
use Faker\Generator as Faker;

$factory->define(Form::class, function (Faker $faker) {
    return [
        'slug' => $faker->unique()->slug,
        'name' => $faker->word,
        'description' => $faker->realText(),
        'is_active' => 0
    ];
});
