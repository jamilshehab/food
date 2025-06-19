<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantInformationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Models\RestaurantInformation;
use Illuminate\Support\Facades\Route;


 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/',  [HomeController::class,'index'])->name('home');
    
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    
       Route::resource('slider',NavigationController::class)->except('show');

    Route::resource('slider',SliderController::class)->names([
        'index'   => 'slider.view',
        'create'  => 'slider.create',
        'store'   => 'slider.store',
        'edit'    => 'slider.edit',
        'update'  => 'slider.update',
        'destroy' => 'slider.destroy',
    ])->except('show');
 
    Route::resource('about',AboutController::class)->names([
        'index'   => 'about.view',
        'create'  => 'about.create',
        'store'   => 'about.store',
        'edit'    => 'about.edit',
        'update'  => 'about.update',
        'destroy' => 'about.destroy',
     ])->except('show');
        
       Route::resource('menu',MenuController::class)->names([
        'index'   => 'menu.view',
        'create'  => 'menu.create',
        'store'   => 'menu.store',
        'edit'    => 'menu.edit',
        'update'  => 'menu.update',
        'destroy' => 'menu.destroy',
     ])->except('show');

     Route::resource('footer',RestaurantInformationController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
