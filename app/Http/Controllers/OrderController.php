<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Navigation;
use App\Models\Order;
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
    $cartTotal = $cartItems->sum(function ($item) {
        return $item->price * $item->pivot->quantity;
    });
    return view('checkout', ['logo'=>$logo,'navigation'=>$navigation , 'footer'=>$footer , 'cartItems'=>$cartItems,'cartTotal'=>$cartTotal]); // Explicit variable passing
 
    }
    public function confirmation(string $id){
        $order=Order::with('menus')->find($id);

        
        return view('order.confirmation',compact('order'));
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
    $user = auth()->user();
    $cart = $user->cart;
    
    if (!$cart) {
        return back()->with('error', 'Your cart is empty');
    }

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'phone_number' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);
    
    $validated['user_id'] = $user->id;

    // Create the order
    $order = Order::create($validated);
    
    // Attach all cart items to the order
    foreach ($cart->menus as $menu) {
        $order->menus()->attach($menu->id, [
            'quantity' => $menu->pivot->quantity,
            'price' => $menu->price
        ]);
    }
    
    // Clear the cart
    $cart->menus()->detach();
    $cart->update(['total' => 0]); // if you have a total field
    
    return redirect()->route('order.confirmation', $order)
        ->with('success', 'Order placed successfully!');
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
