<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantInformationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;


 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/',  [HomeController::class,'index'])->name('home');
    Route::resource('logo',LogoController::class)->except('show'); 
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('header',NavigationController::class)->except('show');
    Route::resource('slider',SliderController::class)->except('show');
    Route::resource('about',AboutController::class)->except('show');   
    Route::resource('menu',MenuController::class)->except('show');
    Route::resource('footer',RestaurantInformationController::class)->except('show');
    Route::post('/addToCart', [CartController::class, 'store'])->name('cart.store');
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
