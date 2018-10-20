<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/checkout', 'PickUpController@checkOutNow')->name('checkout');
Route::get('/choose-location', 'PickUpController@chooseLocation')->name('choose-location');
Route::post('/create-reservation', 'PickUpController@reseration')->name('create-reservation');


