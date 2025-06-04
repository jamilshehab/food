<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Menu;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   public function index() {
    $sliders = Slider::where('user_id', auth()->id())->latest()->get();
    $about = About::where(column: 'user_id', operator: '=', value: auth()->id())->get()->first();
    $menus = Menu::where(column: 'user_id', operator: '=', value: auth()->id())->latest()->get();
    return view('landing', ['sliders' => $sliders, 'about'=> $about, 'menus' => $menus]); // Explicit variable passing
}
  
}
