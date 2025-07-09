<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\Navigation;
use App\Models\RestaurantInformation;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   public function index() {
    $logo=Logo::get()->first();
    $navigation = Navigation::get();
    $sliders = Slider::get();
    $about = About::get()->first();
    $menus = Menu::all();
    $footer = RestaurantInformation::get()->first();
    return view('landing', ['logo'=>$logo, 'navigation'=>$navigation,'sliders' => $sliders, 'about'=> $about, 'menus' => $menus , 'footer'=>$footer]); // Explicit variable passing
}
  
}
