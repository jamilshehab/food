<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Storage;

class MenuController extends Controller
{
    
    public function index()
    {
        //
        $menus = Menu::where('user_id', auth()->id())->latest()->paginate(8);
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          return view(view: 'menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients' => 'required|string',
        'price' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Generate a unique filename
        $fileName = 'menu_' . time() . '.' . $request->file('image')->extension();
        // Store the file in the 'public' disk (usually storage/app/public)
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        // Save the public URL to the database
        $validated['image'] = Storage::url($path);
    }
    $validated['user_id'] = auth()->id();

    Menu::create($validated);

    return redirect()->route('menu.index')->with('success', 'Menu Created Successfully!');
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
    public function edit(Menu $menu)
    {
        //
        $user=auth()->user();
       if($menu->user_id !== $user->id){
        return abort(404 , 'UnAuthorized Access');
        }
        return view('menu.edit')->with(['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    $user = auth()->user();
  
    // Authorization check (assuming sliders have a user_id column)
    if ($menu->user_id !== $user->id) {
        return abort(404 , 'UnAuthorized Access');

    }

   $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients'=>'required|string',
        'price' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
   
    // Handle file upload
    if ($request->hasFile('image')) {
         // Generate a unique filename
        $fileName = 'menu_' . time() . '.' . $request->file('image')->extension();
        // Store the file in the 'public' disk (usually storage/app/public)
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        // Save the public URL to the database
        $validated['image'] = Storage::url($path);
    }
    $menu->update($validated);
    return redirect()->route('menu.index')->with('success', 'Menu Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    { 
        $user = auth()->user();
        if ($menu->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Not Authorized');
       }
       $menu->delete();
       return redirect()->route('menu.index')->with('success','menu deleted');
    }
}
