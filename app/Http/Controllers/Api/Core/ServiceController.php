<?php

namespace App\Http\Controllers\Api\Core;

use App\Http\Controllers\Controller;
use App\Http\Resources\Contract\ContractResource;
use App\Http\Resources\Core\ContactResource;
use App\Http\Resources\Service\ServiceDetailsResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\Category;
use App\Models\Contacting;
use App\Models\ContractPackage;
use App\Models\Order;
use App\Models\Service;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function orderedServices()
    {
        $mostSellingServices = Service::query()->where('best_seller', 1)
            ->where('active', 1)
            ->get()->shuffle();
        $this->body['most_ordered_services'] = ServiceResource::collection($mostSellingServices);
        return self::apiResponse(200, null, $this->body);
    }
    protected function allServices()
    {
        $services = Service::with('serviceImages')->get();
        $this->body['all_services'] = ServiceResource::collection($services);
        return self::apiResponse(200, null, $this->body);
    }
    protected function getServiceFromCategory($id)
    {
        $servicesCategory = Category::query()->where('id', $id)->first();

        if ($servicesCategory) {
            $allServices = $servicesCategory->services;
            $services = [];
            foreach ($allServices as $service) {
                if ($service->is_package == 0) {
                    $services[] = $service;
                }
            }
            $this->body['category_services'] = ServiceResource::collection($services);
            return self::apiResponse(200, null, $this->body);
        }
        return self::apiResponse(400, __('api.category not found'), $this->body);
    }
    protected function serviceDetails($id)
    {
        if ($id == "all") {
            $services = Service::with('serviceImages')->get();
            $this->body['all_services'] = ServiceResource::collection($services);
            return self::apiResponse(200, null, $this->body);
        } else {
            $service = Service::query()->where('id', $id)->first();

            if ($service) {
                $this->body['service'] = ServiceDetailsResource::make($service);
                return self::apiResponse(200, null, $this->body);
            }
            return self::apiResponse(400, __('api.service not found'), $this->body);
        }
    }


    protected function PackageDetails($id)
    {
        $package = ContractPackage::query()->where('id', $id)->first();
        if ($package) {
            $this->body['package'] = ContractResource::make($package);
            return self::apiResponse(200, null, $this->body);
        }
        return self::apiResponse(400, __('api.package not found'), $this->body);
    }

    protected function getContact()
    {
        $contacts = Contacting::query()->get();
        $this->body['contact'] = ContactResource::collection($contacts);
        return self::apiResponse(200, null, $this->body);
    }
}
