<?php

namespace App\Http\Resources\Booking;

use App\Http\Resources\Order\StatusResource;
use App\Http\Resources\Service\CategoryBasicResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\VisitsStatus;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        $services = $this->order?->services->where('category_id', $this->category->id);

        // $services = Service::where('id', $this->service_id)->get();


        return [
            'id' => $this->id,
            'booking_no' => $this->booking_no,
            'status' => $this->visit ? StatusResource::make($this->visit->status) : null,
            'category' => CategoryBasicResource::make($this->category),
            'services' => $services ? ServiceResource::collection($services) : [ServiceResource::make($this->package->service)],
            //  'services' => ServiceResource::collection($services),
            'image' => $this->category->slug ? asset($this->category->slug) : '',
            'date' => Carbon::parse($this->date)->timezone('Asia/Riyadh')->format('d M'),
            'time_start' => Carbon::parse($this->time)->timezone('Asia/Riyadh')->format('g:i A'),
            'time_end' => Carbon::parse($this->end_time)->timezone('Asia/Riyadh')->format('g:i A')
        ];
    }
}
