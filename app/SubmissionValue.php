<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubmissionValue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'field_id', 'value'
    ];

    /**
     * Define a one-to-one relationship to parent submission
     *
     * @return HasOne
     */
    public function submission(): HasOne
    {
        return $this->hasOne(Submission::class);
    }
}
