<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('company', [\App\Http\Controllers\API\CompanyController::class, 'index']);
Route::get('employee', [\App\Http\Controllers\API\EmployeeController::class, 'index']);
