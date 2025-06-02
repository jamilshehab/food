<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::where('user_id', auth()->id())->latest()->paginate(8);
        return view('menu.view', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view('menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
   {
    
  $validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'price' => 'nullable|integer',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);
    // Handle file upload
    if ($request->hasFile('image')) {
     $validated['image'] = $request->file('image')->store('menu/images', 'public');         
    }

    // Add user_id to validated data
    $validated['user_id'] = auth()->id();

    Menu::create($validated);
    
    return redirect()->route('menu.view')->with('success', 'Menu Created Successfully!');
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
