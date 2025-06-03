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
    //sliders
    
    Route::get('/viewslider',[SliderController::class,'index'])->name('slider.view');
    Route::get('/addslider',[SliderController::class,'create'])->name('slider.create');
    Route::post('/addslider',[SliderController::class,'store'])->name('slider.store');
    Route::patch('/editslider',[SliderController::class,'update'])->name('slider.update');
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('slider.update');

    Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); 
    Route::get('/viewabout',[AboutController::class,'index'])->name('about.view');
    Route::get('/addabout', action:[AboutController::class,'create'])->name('about.create');
    Route::post('/addabout',[AboutController::class,'store'])->name('about.store');

    Route::get('/viewmenu',[MenuController::class,'index'])->name('menu.view');
    Route::get('/addmenu', action:[MenuController::class,'create'])->name('menu.create');
    Route::post('/addmenu',[MenuController::class,'store'])->name('menu.store');

    Route::get('/sliders/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/sliders/{id}', [MenuController::class, 'update'])->name('menu.update');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
