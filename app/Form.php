<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    /**
     * User friendly name for model
     *
     * @var string $name
     */
    public static $name = 'Form';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'description', 'is_active'
    ];

    /**
     * Define a one-to-many relationship for form fields
     *
     * @return HasMany
     */
    public function formFields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    /**
     * Define a one-to-many relationship for form submissions
     *
     * @return HasMany
     */
    public function formSubmissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}
