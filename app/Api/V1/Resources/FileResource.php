<?php

namespace App\Api\V1\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FileResource extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {

        return [
            'file_types' => $this->file_types
        ];
    }
}
