<?php

namespace App\Http\Resources\Cars;

use Illuminate\Http\Resources\Json\JsonResource;

class TypesResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
