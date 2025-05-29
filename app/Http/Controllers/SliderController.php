<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sliders = Slider::where('user_id', auth()->id())->latest()->paginate(8);
        return view('index-2', compact('sliders'));
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
    $validated = $request->validate([
        'slider_title' => 'required|string|max:255',
        'slider_content' => 'required|string',
        'anchor_link' => 'nullable|url',
        'anchor_text' => 'nullable|string|max:255',
        'detail' => 'required|string',
        'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $input = $request->except('slider_image'); // Get all except image first
    
    if ($image = $request->file('slider_image')) {
        $destinationPath = public_path('images/');
        
        // Create directory if it doesn't exist
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
         
        $profileImage = 'slider_'.md5(date('YmdHis')).'.'.$image->extension();
        
        $image->move($destinationPath, $profileImage);
        $input['slider_image'] = $profileImage;
    }

    // Assuming you're saving to a model
    $slider = Slider::create($input);
    return redirect()->back()->with('success', 'Slider created successfully');
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
