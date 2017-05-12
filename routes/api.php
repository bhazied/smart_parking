<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api', 'checkIp']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user()->with('country')->find($request->user()->id);
    });
    Route::resource('users', 'Api\UserController');
    Route::resource('cars', 'Api\CarController');
});

Route::post('/login', 'Auth\ApiLoginController@login');
Route::resource('countries', 'Api\CountryController');
Route::resource('states', 'Api\StateController');
Route::resource('regions', 'Api\RegionController');
Route::resource('languages', 'Api\LanguageController');
Route::resource('parkings', 'Api\ParkingController');
Route::resource('car_bodies', 'Api\CarBodyController');
Route::resource('car_models', 'Api\CarModelController');
Route::resource('car_brands', 'Api\CarBrandController');
