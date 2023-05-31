<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Backend\DashboardController;

Route::view('/', 'welcome');

Route::group(['namespace' => 'Backend', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('user', UserController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('password/{id}', [PasswordController::class, 'update'])->name('password.update');

    Route::get('user/{user}/status', [UserController::class, 'status'])->name('user.status');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
