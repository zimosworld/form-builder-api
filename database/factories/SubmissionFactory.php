<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\{Form, Submission};
use Faker\Generator as Faker;

$factory->define(Submission::class, function (Faker $faker, array $attr) {

    return [
        'form_id' => factory(Form::class),
        'values' => $attr['values']
    ];
});
