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
       $cart = auth()->user()->cart;

    // Assign cart items or empty collection
    $cartItems = $cart
        ? $cart->menus()->withPivot('quantity')->get()
        : collect();

    return view('landing', compact('cartItems'));
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
    $request->validate([
        'menu_id' => 'required|exists:menus,id',
    ]);

    // Get or create the user's cart
    $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);

    // Check if the item is already attached to the cart
    $existing = $cart->menus()->where('menu_id', $request->menu_id)->first();

    if ($existing) {
        // If exists, increment the quantity
        $currentQty = $existing->pivot->quantity;
        $cart->menus()->updateExistingPivot($request->menu_id, [
            'quantity' => $currentQty + 1
        ]);
    } else {
        // If not, attach it with quantity = 1
        $cart->menus()->attach($request->menu_id, ['quantity' => 1]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Item added to cart!',
    ]);
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
