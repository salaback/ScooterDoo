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


Route::post('/checkout', 'PickUpController@checkOutNow')->name('checkout');
Route::get('/choose-location', 'PickUpController@chooseLocation')->name('choose-location');
Route::get('/reserve', 'PickUpController@createReservation')->name('reserve');
Route::get('/trip-in-progress', 'PickUpController@tripInProgress')->name('tripInProgress');
Route::get('/unlock/{scooter_id}', 'PickUpController@unlock')->name('unlock');
Route::post('/create-reservation', 'PickUpController@storeReservation')->name('create-reservation');
Route::get('/station/find-scooter/{station_id}', 'ScooterController@find');
Route::post('/return', 'PickUpController@return')->name('return');


Route::get('/admin/resetdb', 'AdminController@resetdb')->name('reset');
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');
