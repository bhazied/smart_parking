<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/test', function(Request $request){
        return response()->json([1,2,3,4,5]);
    });
});
Route::get('/test1', function(){
    return response()->json([1,2,3,4,5]);
});
Route::post('/login', 'Auth\ApiLoginController@login');