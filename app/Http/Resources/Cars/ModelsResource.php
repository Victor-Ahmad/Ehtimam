<?php

namespace App\Http\Resources\Cars;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelsResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => TypesResource::make($this->type),
        ];
    }
}
