<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   public function slider() {
    $sliders = Slider::where('user_id', auth()->id())->latest()->get();

    $menus = Menu::where(column: 'user_id', operator: '=', value: auth()->id())->latest()->get();
    
    return view('landing', ['sliders' => $sliders,'menus' => $menus]); // Explicit variable passing
}
   public function menu()
{
    
    return view('landing', compact('menus'));
}
}
