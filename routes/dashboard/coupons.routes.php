<?php


Route::get('coupons/viewSingleCoupon', [CouponsController::class, 'viewSingle'])->name('coupons.viewSingleCoupon');
Route::resource('coupons', 'Coupons\CouponsController');
Route::get('coupons/change_status/change', 'Coupons\CouponsController@change_status')->name('coupons.change_status');
