<?php

namespace App\Api\V1\Requests;

use App\FormField;
use Illuminate\Validation\Rule;

class UpdateField extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'max:255',
            'validation_rules' => 'max:255',
            'type' => Rule::in(array_values(FormField::$field_types))
        ];

        return $rules;
    }
}
