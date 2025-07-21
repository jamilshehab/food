<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Navigation;
use App\Models\RestaurantInformation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    $logo=Logo::get()->first();
    $navigation = Navigation::get();
    $footer = RestaurantInformation::get()->first();
    $cart = auth()->user()->cart;
    $cartItems = $cart ? $cart->menus()->get() : collect();
    return view('checkout', ['logo'=>$logo,'navigation'=>$navigation , 'footer'=>$footer , 'cartItems'=>$cartItems]); // Explicit variable passing
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $total=0;
        $validated = $request->validate([
        'first_name'    => 'required|string|max:255',
        'last_name'     => 'required|string|max:255',
        'address'       => 'required|string|max:255',
        'city'          => 'required|string|max:255',
        'country'       => 'required|string|max:255',
        'email'         => 'required|email|unique:users,email',
        'company'       => 'nullable|string|max:255',
        'phone_number'  => 'required|string|max:20',
        'payment'       => 'required|integer',
        'delivery'      => 'required|integer',
    ]);
    if($validated['payment']==="paypal"){
     $total+=10;
    } 
    else if ($validated['payment'] === "Payment Gateway"){
        $total+=12;
    }
    else{
        $total+=20;
    }
    Order::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
