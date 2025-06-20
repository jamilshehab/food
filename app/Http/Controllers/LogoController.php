<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Storage;

class LogoController extends Controller
{
    //
    public function index(){
        $userId=auth()->id();
        $logo=Logo::where('user_id',$userId)->get()->first();
        return view('logo.logo',compact('logo'));
    }
     
     public function create()
    {
        return view('logo.form.add');
    }
     

  public function store(Request $request)
{
    // Validate: 'image.*' means each image in array
    $validated = $request->validate([  
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'class' => 'required|string',
    ]);

    $imageNames = [];

    // Check if there are any uploaded files
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $name = time().'_'.$file->getClientOriginalName();
            $file->storeAs('logo/images', $name, 'public');
            $imageNames[] = $name;
        }
    }

    // Add user ID
    $validated['user_id'] = auth()->id();

    // Convert array of image names to string (you can use JSON if preferred)
    $validated['image'] = implode(',', $imageNames);

    Logo::create($validated);

    return redirect()->route('logo.index')->with('success', 'Logo created successfully!');
}

   public function edit(string $id)
    {
        $logo=Logo::findOrFail($id);
        $userId=auth()->user()->id;
        if($logo->user_id !==$userId){
          return redirect()->back()->with('error', 'Not Authourized');
        }
        return view('logo.edit')->with(['logo' => $logo]);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
{
    $user = auth()->user();
    $logo = Logo::findOrFail($id);
  
    // Authorization check
    if ($logo->user_id !== $user->id) {
        return redirect()->back()->with('error', 'Not Authorized');
    }

    $validated = $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Changed 'images' to 'image'
    ]);
   
    // Handle file upload if image is present in the request
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($logo->image && Storage::exists('public/' . $logo->image)) {
            Storage::delete('public/' . $logo->image);
        }

        // Store new image
        $path = $request->file('image')->store('uploads', 'public');
        $validated['image'] = $path; // Add the path to validated data
    }

    $logo->update($validated);
    
    return redirect()->route('logo.index')->with('success', 'Logo Updated Successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $about=Logo::findOrFail($id);
        $user = auth()->user();
        if ($about->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Not Authorized');
       }
       $about->delete();
       return redirect()->route('logo.index')->with('success','logo deleted');
    }

}
