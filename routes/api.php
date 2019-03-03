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
//Route::group([
//    'domain' => config('app.app_domain'),
//    'namespace' => 'Api'
//], function () {
//    Route::group([
//        'prefix' => 'api/v3',
//        'namespace' => 'App\V3',
//    ], function () {
//        Route::post('user/login', 'UserController@login');
//
//        // 认证
//        Route::middleware('auth:api')->group(function () {
//
//        });
//    });
//});

Route::group([
    'domain' => config('app.app_domain'),
    'namespace' => 'Api'
],function () {
    Route::post('user/login', 'UserController@login');
    Route::post('user/register', 'UserController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        // 认证
        Route::post('get-details', 'API\PassportController@getDetails');
    });
});