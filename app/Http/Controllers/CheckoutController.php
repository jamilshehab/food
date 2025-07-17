<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Navigation;
use App\Models\RestaurantInformation;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
   public function index() {
    $logo=Logo::get()->first();
    $navigation = Navigation::get();
    $footer = RestaurantInformation::get()->first();
    $cart = auth()->user()->cart;
    $cartItems = $cart ? $cart->menus()->get() : collect();
    return view('checkout', ['logo'=>$logo, 'navigation'=>$navigation , 'footer'=>$footer , 'cartItems'=>$cartItems]); // Explicit variable passing
}
}
