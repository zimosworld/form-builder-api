<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\{Form, FormField, Input, Select, TextArea, File};
use Faker\Generator as Faker;

$factory->define(FormField::class, function (Faker $faker) {
    $fields = [
        Input::class,
        Select::class,
        TextArea::class,
        File::class
    ];
    $fieldType = $faker->randomElement($fields);
    $field = factory($fieldType)->create();

    return [
        'form_id' => factory(Form::class),
        'field_type' => $fieldType,
        'field_id' => $field->id,
        'name' => $faker->word,
        'validation_rules' => ''
    ];
});
