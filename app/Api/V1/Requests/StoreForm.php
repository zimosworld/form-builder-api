<?php

namespace App\Api\V1\Requests;

class StoreForm extends BaseRequest
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
            'slug' => 'required|max:255|unique:forms,slug',
            'name' => 'required|max:255',
            'description' => 'max:255'
        ];
    }
}
