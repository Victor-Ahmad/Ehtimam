<?php

use App\Http\Controllers\Api\Core\ContactUsController;
use App\Http\Controllers\Api\Core\HomeController;
use App\Http\Controllers\Api\Core\ServiceController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Models\User;

Route::prefix('home')->group(function (){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/city', [HomeController::class, 'getCity']);
    Route::get('/region/{id}', [HomeController::class, 'getRegions']);
    Route::get('/regions', [HomeController::class, 'getAllRegions']);

});

Route::prefix('services')->group(function (){
    Route::get('/all', [ServiceController::class, 'allServices']);
    Route::get('/most_ordered', [ServiceController::class, 'orderedServices']);
});

Route::post('contactus',[ContactUsController::class,'store']);
Route::post('home_search', [HomeController::class, 'search']);
Route::post('home_filter', [HomeController::class, 'filter']);
Route::post('contract_contact', [HomeController::class, 'contract_contact']);

Route::get('package/{id}', [ServiceController::class, 'PackageDetails']);
Route::get('/magic' , [AuthController::class, 'magic']);
