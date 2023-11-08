<?php

namespace App\Http\Resources\Service;

use App\Models\Service;
use App\Models\ServiceServices;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $service = Service::query()->find($this['id']);
        $images = [];
        foreach ($service->serviceImages as $serviceImage) {
            if ($serviceImage->image) {
                $images[] = asset($serviceImage->image);
            }
        }
        if (isset($this['quantity'])) {
            $quantity = $this['quantity'];
        }
        if ($service->is_package == 1) {
            $servicesIds = ServiceServices::where('package_service_id', $service->id)->pluck('service_id')->toArray();
            $services = Service::whereIn('id',  $servicesIds)->get();
            return [
                'id' => $this['id'],
                'title' => $this['title'],
                'price' => $service['price'],
                'services' => ServiceResource::collection($services),
                'images' => $images,
                'icons' => IconResource::collection($this->icons),
                'able_to_add_quantity_in_cart' => isset($this['is_quantity']) ? $this['is_quantity'] : null,
                'quantity' => $quantity ?? $this->pivot?->quantity
            ];
        }
        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'price' => $service['price'],
            'images' => $images,
            'icons' => IconResource::collection($this->icons),
            'able_to_add_quantity_in_cart' => isset($this['is_quantity']) ? $this['is_quantity'] : null,
            'quantity' => $quantity ?? $this->pivot?->quantity
        ];
    }
}
