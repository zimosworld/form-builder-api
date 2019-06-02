<?php

namespace App\Api\V1\Resources;

use App\FormField;
use Illuminate\Http\Resources\Json\Resource;

class FormFieldResource extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $fieldType = FormField::$field_types[$this->field_type];

        $fieldClass = "App\Api\V1\Resources\\{$fieldType}Resource";

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $fieldType,
            $this->mergeWhen(class_exists($fieldClass), new $fieldClass($this->field)),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
        ];
    }
}
