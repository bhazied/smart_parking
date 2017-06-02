<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/register', 'Auth\RegisterController@register');
Route::get('/confirm/{id}/{token}', 'Auth\ApiLoginController@confirm');
Route::post('/oauth/token', [
    'uses' => 'Api\CustomAccessTokenController@issueUserToken'
]);
Route::post('/login', 'Auth\ApiLoginController@login');
Route::resource('countries', 'Api\CountryController', ['only' => 'index']);
Route::resource('states', 'Api\StateController', ['only' => 'index']);
Route::resource('regions', 'Api\RegionController', ['only' => 'index']);
Route::resource('languages', 'Api\LanguageController', ['only' => ['index'] ]);
Route::resource('parkings', 'Api\ParkingController', ['only' => 'index']);
Route::resource('car_bodies', 'Api\CarBodyController', ['only' => 'index']);
Route::resource('car_models', 'Api\CarModelController', ['only' => 'index']);
Route::resource('car_brands', 'Api\CarBrandController', ['only' => 'index']);

Route::middleware('auth:api')->get('/profile', function () {
    return Auth::user();
});

Route::group(['middleware' => ['auth:api', 'autrhorization']], function () {
    Route::resource('users', 'Api\UserController');
    Route::resource('cars', 'Api\CarController');
    Route::resource('countries', 'Api\CountryController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('states', 'Api\StateController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('regions', 'Api\RegionController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('languages', 'Api\LanguageController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('parkings', 'Api\ParkingController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('car_bodies', 'Api\CarBodyController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('car_models', 'Api\CarModelController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
    Route::resource('car_brands', 'Api\CarBrandController', ['only' => ['create', 'update', 'destroy', 'show'] ]);
});
