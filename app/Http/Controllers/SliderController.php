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
       $sliders = Slider::where(column: 'user_id', operator: '=', value: auth()->id())->latest()->paginate(8);
        return view('slider.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.add');
    }
    /**store the items below */
    public function store(Request $request)
   {
    $validated = $request->validate([
        'slider_title' => 'required|string|max:255',
        'slider_content' => 'required|string',
        'anchor_link' => 'nullable|string',
        'anchor_text' => 'nullable|string|max:255',
        'slider_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('slider_image')) {
     $validated['slider_image'] = $request->file('slider_image')->store('slider/images', 'public');         

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
     $user=auth()->user();
     $slider=Slider::findOrFail($id);

    if($slider->user_id !== $user->id){
     return redirect()->back()->with('error', 'Not Authourized');
    
    }

     
     return view('slider.edit')->with(['slider' => $slider]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $user = auth()->user();
    $slider = Slider::findOrFail($id);
    // Authorization check (assuming sliders have a user_id column)
    if ($slider->user_id !== $user->id) {
        return redirect()->back()->with('error', 'Not Authorized');
    }

   $validated = $request->validate([
        'slider_title' => 'required|string|max:255',
        'slider_content' => 'required|string',
        'anchor_link' => 'required|string',
        'anchor_text' => 'required|string|max:255',
        'slider_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('slider_image')) {
        $fileName = 'slider_'.md5(string: date('YmdHis')).'.'.$request->file('slider_image')->extension();
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
        $user = auth()->user();
        $slider=Slider::findOrFail($id);
        if ($slider->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Not Authorized');
    }
        $slider->delete();
       return redirect()->route('slider.view')->with('success','slider deleted');
    }
}
