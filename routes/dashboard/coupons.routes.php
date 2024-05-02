<?php


Route::get('coupons/viewSingleCoupon',  'Coupons\CouponsController@viewSingle')->name('coupons.viewSingleCoupon');
Route::resource('coupons', 'Coupons\CouponsController');
Route::get('coupons/change_status/change', 'Coupons\CouponsController@change_status')->name('coupons.change_status');
