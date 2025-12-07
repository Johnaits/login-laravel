<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::prefix('/web')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('receiver');
});