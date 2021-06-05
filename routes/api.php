<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'API', 'middleware' => 'auth:sanctum'], function () {

    Route::get('me', 'AuthController@me');

    Route::apiResource('user', 'UserController');
    Route::apiResource('company', 'CompanyController');
    Route::apiResource('employee', 'EmployeeController');

    Route::post('logout', 'AuthController@logout');

});

Route::group(['namespace' => 'API'], function () {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

});



