<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::prefix('/web')->group(function () {
     // Register Routes
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

});