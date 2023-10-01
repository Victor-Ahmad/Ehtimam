<?php


use App\Http\Controllers\Api\Cars\CarsController;

Route::get('car/types', [CarsController::class, 'allType']);
Route::get('car/models', [CarsController::class, 'allModel']);
Route::get('car/getModelByType/{id}', [CarsController::class, 'getModelByType']);
Route::get('car/getCarByClient', [CarsController::class, 'getCarByClient']);
Route::post('car/deleteClientCar', [CarsController::class, 'deleteClientCar']);
Route::post('car/addClientCar', [CarsController::class, 'addClientCar']);
Route::post('car/updateClientCar', [CarsController::class, 'updateClientCar']);
