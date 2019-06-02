<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\SubmissionValue;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(SubmissionValue::class, function (Faker $faker, array $attr) {

    switch($attr['field']->field_type) {
        case 'App\Select':
            $choices = json_decode($attr['field']->field()->first()->choices);

            $value = $faker->randomElement($choices);
            break;
        case 'App\Input':
            $value = $faker->word();
            break;
        case 'App\File':
            $value = UploadedFile::fake()->create($faker->word);
            break;
        case 'App\TextArea':
            $value = $faker->words(10, true);
            break;
        default:
            $value = null;
            break;
    }

    return [
        'field_id' => $attr['field']->id,
        'value' => $value
    ];
});
