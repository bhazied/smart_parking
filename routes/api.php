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

Route::group(['middleware' => ['auth:api', 'autrhorization']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user()->with('country')->find($request->user()->id);
    });
    Route::get('userss', [
        'uses' => 'Api\UserController@index',
        'roles' => ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']
    ]);
    Route::resource('users', 'Api\UserController');
    Route::resource('cars', 'Api\CarController', ['only' => 'create', 'edit', 'delete']);
});

Route::post('/login', 'Auth\ApiLoginController@login');
Route::resource('cars', 'Api\CarController', ['only' => 'index']);
Route::resource('countries', 'Api\CountryController', ['except' => ['create', 'edit']]);
Route::resource('states', 'Api\StateController', ['except' => ['create', 'edit']]);
Route::resource('regions', 'Api\RegionController', ['except' => ['create', 'edit']]);
Route::resource('languages', 'Api\LanguageController', ['except' => ['create', 'edit']]);
Route::resource('parkings', 'Api\ParkingController', ['except' => ['create', 'edit']]);
Route::resource('car_bodies', 'Api\CarBodyController', ['except' => ['create', 'edit']]);
Route::resource('car_models', 'Api\CarModelController', ['except' => ['create', 'edit']]);
Route::resource('car_brands', 'Api\CarBrandController', ['except' => ['create', 'edit']]);
