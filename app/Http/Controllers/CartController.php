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
     $cartItem = $cart->menus()->where('menu_id', $request->menu_id)->first();

    if ($cartItem) {
        // If exists, increment the quantity
        $currentQty = $cartItem->pivot->quantity;
        $cart->menus()->updateExistingPivot($request->menu_id, [
            'quantity' => $currentQty + 1
        ]);
     } else {
        // If not, attach it with quantity = 1
        $cart->menus()->attach($request->menu_id, ['quantity' => 1]);
        $cart->menus()->price + $cartItem->total;
    }
    return response()->json([
        'success' => true,
        'cart' => $cart,
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
         $request->validate([
        'quantity' => 'required|integer|min:1'
         ]);

    $user = auth()->user();
    
    if (!$user->cart) {
        return response()->json([
            'success' => false,
            'message' => 'Cart not found'
        ], 404);
    }

    $cart = $user->cart;
    
    // Check if item exists in cart
    $cartItem = $cart->menus()->where('menu_id', $request->menu_id)->first();

    if (!$cartItem) {
        return response()->json([
            'success' => false,
            'message' => 'Item not found in cart'
        ], 404);
    }

    // Update quantity
    $cart->menus()->updateExistingPivot($request->menu_id, [
        'quantity' => $request->quantity,
        'updated_at' => now()
    ]);

    // Refresh and calculate totals
    $cart->load('menus');
    
    // $total = $cart->menus->sum(function($menu) {
    //     return $menu->price * $menu->pivot->quantity;
    // });
    // $cart->total += $cartItem->price;
     $cart->update(['total' => $cart->total]);

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'message' => 'Cart updated successfully',
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $user = auth()->user();
    $cart = $user->cart;
     if (!$cart) {
        return response()->json([
            'success' => false,
            'message' => 'Cart not found'
        ], 404);
    }
    
    // Remove the item
    $cart->menus()->detach($id);
    
    // Refresh relationships and calculate total
    $cart->load('menus');
    // $total = $cart->menus->sum(function($menu) {
    //     return $cart->total + $cart->pivot->quantity;
        
    // });
    
    $cart->update(values: ['cart' => $cart]);
    
    return response()->json([
        'success' => true,
        'cart' => $cart, // Return updated cart
        'message' => 'Item removed successfully',
    ]);
}
}
