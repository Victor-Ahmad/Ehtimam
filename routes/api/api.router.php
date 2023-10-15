<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Checkout\CheckoutController;
use App\Http\Controllers\Api\Core\HomeController;
use App\Http\Controllers\Api\Core\ServiceController;
use App\Http\Controllers\Api\Coupons\CouponsController;
use App\Http\Controllers\Api\Settings\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [AuthController::class, 'login']);

Route::post('/verify', [AuthController::class, 'verify']);

Route::get('/magic_code' , [AuthController::class, 'magic_code']);

Route::get('/services_from_category/{id}', [ServiceController::class, 'getServiceFromCategory']);

//Route::post('/payment-callback/{type?}',[CheckoutController::class,'callbackPayment']);

Route::prefix('home')->group(function (){
    Route::get('/index', [HomeController::class, 'index']);
    Route::get('/search', [HomeController::class, 'search']);
});
Route::get('services/{id}', [ServiceController::class, 'serviceDetails']);
Route::get('/coupons', [CouponsController::class, 'allCoupons']);
require __DIR__ . '/settings.router.php';

Route::middleware(['auth:sanctum','abilities:user'])->group(function () {
    Route::get('settings/walletDetails', [SettingsController::class, 'walletDetails']);
    require __DIR__ . '/core.router.php';
    require __DIR__ . '/auth.router.php';
    require __DIR__ . '/users.router.php';
    require __DIR__ . '/checkout.router.php';
    require __DIR__ . '/order.router.php';
    require __DIR__ . '/cars.router.php';
});

Route::prefix('techn')->group(function () {
    require __DIR__ . '/techn/techn.router.php';
});
