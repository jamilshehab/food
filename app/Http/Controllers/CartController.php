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
      
      return response()->json([
        'cart' => $cart
      ]);

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
    public function destroy($id)  // Can accept either Menu $menu or $id
    {
    // If you want to use route model binding:
    // $menu = Menu::findOrFail($id);
    
    $cart = auth()->user()->cart;
    
    $cart->menus()->detach($id);
    
    $cart->update([
        'total' => $cart->menus->sum(function($item) {
            return $item->pivot->price_at_addition * $item->pivot->quantity;
        })
    ]);
    
    return response()->json([
        'success' => true,
        'newTotal' => $cart->total
    ]);
}
}
