<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Submission extends Model
{
    /**
     * User friendly name for model
     *
     * @var string $name
     */
    public static $name = 'Submission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'form_id'
    ];

    /**
     * Define a one-to-one relationship to form
     *
     * @return HasOne
     */
    public function form(): HasOne
    {
        return $this->hasOne(Form::class);
    }

    /**
     * Define a one-to-many relationship to submission values
     *
     * @return HasMany
     */
    public function submissionValues(): HasMany
    {
        return $this->hasMany(SubmissionValue::class);
    }
}
