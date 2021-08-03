<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['namespace' => 'Backend', 'middleware' => ['auth']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('profile/{id}', 'ProfileController@update')->name('profile.update');

    Route::get('password', 'PasswordController@index')->name('password.index');
    Route::post('password/{id}', 'PasswordController@update')->name('password.update');

    Route::get('users', [\App\Http\Controllers\Backend\UserController::class, 'users']);

    Route::resource('user', 'UserController');
    Route::get('user/{user}/status', 'UserController@status')->name('user.status');

    Route::resource('company', 'CompanyController');
    Route::resource('employee', 'EmployeeController');

});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
