<?php

namespace App\Http\Controllers\Api\Cars;

use App\Bll\CouponCheck;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cars\CarClientResource;
use App\Http\Resources\Cars\ModelsResource;
use App\Http\Resources\Cars\TypesResource;
use App\Http\Resources\Checkout\UserAddressResource;
use App\Http\Resources\Coupons\CouponsResource;
use App\Models\CarClient;
use App\Models\CarModel;
use App\Models\Cart;
use App\Models\CarType;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\UserAddresses;
use App\Support\Api\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function allType(){
        $car_type = CarType::query()->get();
        $this->body['type'] = TypesResource::collection($car_type);
        return self::apiResponse(200, null, $this->body);
    }

    protected function allModel(){
        $car_model = CarModel::query()->get();
        $this->body['model'] = ModelsResource::collection($car_model);
        return self::apiResponse(200, null, $this->body);
    }

    protected function getModelByType($id){
        $car_model = CarModel::query()->where('type_id',$id)->get();
        $this->body['model'] = ModelsResource::collection($car_model);
        return self::apiResponse(200, null, $this->body);
    }

    protected function getCarByClient(){
        $car_model = CarClient::query()->where('user_id',auth()->user('sanctum')->id)->get();
        $this->body['car_client'] = CarClientResource::collection($car_model);
        return self::apiResponse(200, null, $this->body);
    }

    protected function addClientCar(Request $request){

        $user = auth()->user('sanctum');

        $rules = [
            'type_id' => 'required|exists:car_types,id',
            'model_id' => 'required|exists:car_models,id',
            'color' => 'required',
            'Plate_number' => 'required',
        ];
        $request->validate($rules, $request->all());

        CarClient::create([
            'user_id'=>$user->id,
            'type_id'=>$request->type_id,
            'model_id'=>$request->model_id,
            'color'=>$request->color,
            'Plate_number'=>$request->Plate_number,
        ]);

        return self::apiResponse(200, __('api.successfully'), $this->body);


    }

    protected function updateClientCar(Request $request){

        $user = auth()->user('sanctum');


        $rules = [
            'id' => 'required|exists:car_clients,id',
            'type_id' => 'required|exists:car_types,id',
            'model_id' => 'required|exists:car_models,id',
            'color' => 'required',
            'Plate_number' => 'required',
        ];
        $request->validate($rules, $request->all());

        $car_client = CarClient::where('id',$request->id)->first();


        $car_client->update([
            'user_id'=>$user->id,
            'type_id'=>$request->type_id,
            'model_id'=>$request->model_id,
            'color'=>$request->color,
            'Plate_number'=>$request->Plate_number,
        ]);

        return self::apiResponse(200, __('api.successfully'), $this->body);


    }

    protected function deleteClientCar(Request $request){

        $rules = [
            'id' => 'required|exists:car_clients,id',
        ];
        $request->validate($rules, $request->all());

        $car_client = CarClient::where('id',$request->id)->first();
        $car_client->delete();


        return self::apiResponse(200, __('api.successfully'), $this->body);


    }

}
