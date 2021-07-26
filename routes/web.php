<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['namespace' => 'Backend', 'middleware' => ['auth']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::resource('user', 'UserController');
    Route::get('user/{user}/status', 'UserController@status')->name('user.status');

    Route::resource('company', 'CompanyController');
    Route::resource('employee', 'EmployeeController');

});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
