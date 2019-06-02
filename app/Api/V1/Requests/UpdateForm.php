<?php

namespace App\Api\V1\Requests;

class UpdateForm extends BaseRequest
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
        return [
            'slug' => 'max:255|unique:forms,slug',
            'name' => 'max:255',
            'description' => 'max:255'
        ];
    }
}
