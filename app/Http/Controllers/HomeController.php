<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Menu;
use App\Models\Navigation;
use App\Models\RestaurantInformation;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   public function index() {
    $navigation = Navigation::where(column: 'user_id', operator: '=', value: auth()->id())->get();
    $sliders = Slider::where('user_id', auth()->id())->latest()->get();
    $about = About::where(column: 'user_id', operator: '=', value: auth()->id())->get()->first();
    $menus = Menu::where(column: 'user_id', operator: '=', value: auth()->id())->latest()->get();
    $footer = RestaurantInformation::where(column: 'user_id', operator: '=', value: auth()->id())->get()->first();

    return view('landing', ['navigation'=>$navigation,'sliders' => $sliders, 'about'=> $about, 'menus' => $menus , 'footer'=>$footer]); // Explicit variable passing
}
  
}
