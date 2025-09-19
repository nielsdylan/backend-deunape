<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware([JwtMiddleware::class])->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('/logged-user', [AuthController::class, 'loggedUser'])->name('me');
        Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->name('refresh');
    });


    Route::prefix('customers')->group(function(){
        Route::get('all', [CustomerController::class, 'all']);
        Route::post('register', [CustomerController::class, 'register']);
        Route::get('search/{id}', [CustomerController::class, 'search']);
        Route::put('update', [CustomerController::class, 'update']);
        Route::delete('delete/{id}', [CustomerController::class, 'delete']);
        // Route::controller(CustomerController::class)->group(function(){
        //     Route::get('all', 'all');

        // });
    });

});
