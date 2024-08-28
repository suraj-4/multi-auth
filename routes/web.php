<?php

use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\dashboardController as AdminDashboardController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'],function(){

    // Guest Middlewere
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');

    });

    // Authenticated Middlewere
    Route::group(['middleware' => 'auth'], function(){
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard', [dashboardController::class,'index'])->name('account.dashboard');

    });

});

Route::group(['prefix' => 'account'],function(){

    // Guest Middleware for admin
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');

    });

    // Authenticated Middleware for admin
    Route::group(['middleware' => 'auth'], function(){
        Route::get('dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class,'logout'])->name('admin.logout');
        
    });

});







