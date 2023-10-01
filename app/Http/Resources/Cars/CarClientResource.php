<?php

namespace App\Http\Resources\Cars;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarClientResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'type' => TypesResource::make($this->type),
            'model' => ModelsResource::make($this->model),
            'user' => UserResource::make($this->user),
            'color' => $this->color,
            'Plate_number' => $this->Plate_number,
        ];
    }
}
