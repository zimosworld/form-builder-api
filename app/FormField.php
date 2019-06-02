<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FormField extends Model
{

    /**
     * User friendly name for model
     *
     * @var string $name
     */
    public static $name = 'Form fields';

    /**
     * List of allowed field types
     *
     * @var array $field_types
     */
    public static $field_types = [
        'App\Input' => 'Input',
        'App\Select' => 'Select',
        'App\TextArea' => 'TextArea',
        'App\File' => 'File'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'form_id', 'field_type', 'field_id', 'name', 'validation_rules'
    ];

    /**
     * Define belongs to form
     *
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * Define a polymorphic, inverse many relationship
     *
     * @return MorphTo
     */
    public function field(): MorphTo
    {
        return $this->morphTo();
    }
}
