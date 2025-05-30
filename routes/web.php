<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


 
Route::middleware('auth')->group(function () {
    Route::get('/',  [HomeController::class,'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource(name: 'slider', SliderController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
