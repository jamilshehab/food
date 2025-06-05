<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;


 
Route::middleware('auth')->group(function () {
    Route::get('/',  [HomeController::class,'index'])->name('home');
    
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
   
     
    Route::resource('slider',SliderController::class)->except('show');
    Route::resource('about',AboutController::class)->except('show');
    Route::resource('menu',MenuController::class)->except('show');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
