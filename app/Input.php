<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Input extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'max_characters', 'placeholder'
    ];

    /**
     * Define a polymorphic one-to-one relationship to parent FormField
     *
     * @return MorphOne
     */
    public function formField(): MorphOne
    {
        return $this->morphOne(FormField::class, 'field');
    }
}
