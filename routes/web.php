<?php

use App\Http\Controllers\OutletsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// user route
Route::controller(UserController::class)->group(function () {
    Route::get('/','index');
    Route::prefix('user')->group(function () {
        Route::post('/store','store')->name('user.store');
        Route::get('/fetchall','fetchAll')->name('user.fetchAll');
        Route::delete('/delete','delete')->name('user.delete');
        Route::get('/edit','edit')->name('user.edit');
        Route::post('/update','update')->name('user.update');
    });
});

// outlets route 
Route::controller(OutletsController::class)->group(function () {
    Route::prefix('outlet')->group(function () {
        Route::get('/','index');
        Route::post('/store','store')->name('outlet.store');
        Route::get('/fetchall','fetchAll')->name('outlet.fetchAll');
        Route::delete('/delete','delete')->name('outlet.delete');
        Route::get('/edit','edit')->name('outlet.edit');
        Route::post('/update','update')->name('outlet.update');
    });
});