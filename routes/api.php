<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EmployeeController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'API', 'middleware' => 'auth:sanctum'], function () {

    Route::get('me', 'AuthController@me');

    Route::apiResource('user', UserController::class);
    Route::apiResource('company', CompanyController::class);
    Route::apiResource('employee', EmployeeController::class);

    Route::post('logout', 'AuthController@logout');
});

Route::group(['namespace' => 'API'], function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});