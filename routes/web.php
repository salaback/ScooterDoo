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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/api/scooter')->group(function(){
   Route:: get('find/{stationId}', 'ScooterController@find');
   Route:: post('reserve', 'ScooterController@reserve');
   Route:: get('check-out/{scooterId}', 'ScooterController@checkOut');
   Route:: get('release/{scooterId}', 'ScooterController@release');
   Route:: get('check-in/{scooterId}', 'ScooterController@checkIn');
});