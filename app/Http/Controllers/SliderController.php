<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sliders = Slider::where('user_id', auth()->id())->latest()->paginate(8);
        return view('slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-slider');
    }
    /**store the items below */
    public function store(Request $request)
   {
     
    $validated = $request->validate([
        'slider_title' => 'required|string|max:255',
        'slider_content' => 'required|string',
        'anchor_link' => 'nullable|url',
        'anchor_text' => 'nullable|string|max:255',
        'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('slider_image')) {
        $fileName = 'slider_'.md5(date('YmdHis')).'.'.$request->file('slider_image')->extension();
        $request->file('slider_image')->storeAs('public/sliders', $fileName);
        $validated['slider_image'] = 'sliders/'.$fileName; // Include folder path
    }

    // Add user_id to validated data
    $validated['user_id'] = auth()->id();

    Slider::create($validated);
    
    return redirect()->route('slider.view')->with('success', 'Slider created successfully!');
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
     $slider=Slider::findOrFail($id);
     $user=auth()->user();

     if($slider->user_id !== $user->id){
     return redirect()->back()->with('error', 'Not Authourized');
     }

     return view('sliders.edit-slider', compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $slider = Slider::findOrFail($id);
    $user = auth()->user();

    // Authorization check (assuming sliders have a user_id column)
    if ($slider->user_id !== $user->id) {
        return redirect()->back()->with('error', 'Not Authorized');
    }

   $validated = $request->validate([
        'slider_title' => 'required|string|max:255',
        'slider_content' => 'required|string',
        'anchor_link' => 'nullable|url',
        'anchor_text' => 'nullable|string|max:255',
        'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('slider_image')) {
        $fileName = 'slider_'.md5(date('YmdHis')).'.'.$request->file('slider_image')->extension();
        $request->file('slider_image')->storeAs('public/sliders', $fileName);
        $validated['slider_image'] = $fileName; // Store only filename
    }

    $slider->update($validated);
    return redirect()->route('slider.view')->with('success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
