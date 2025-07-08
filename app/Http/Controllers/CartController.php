<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
         
    $request->validate([
        'menu_id' => 'required|exists:menus,id'
    ]);

    // Add item to cart logic here — this is just an example
$user = auth()->user();
$cart = $user->cart;

foreach($cart)


    $cart = Cart::where('user_id',auth()->id())->where('menu_id',$request->menu_id)->find();
    
    Cart::create([
        'user_id' => auth()->id(),
        'menu_id' => $request->menu_id,
        'quantity' => 1
    ]);

    return response()->json(['message' => 'Item added to cart']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
