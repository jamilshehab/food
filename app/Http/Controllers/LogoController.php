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
        'class_dark'=>'required|string'
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

    // Convert array of image names to string 
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

    // Check user ownership
    if ($logo->user_id !== $user->id) {
        return redirect()->back()->with('error', 'Not Authorized');
    }

    // Validate multiple images and other fields
    $validated = $request->validate([
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'class' => 'required|string',
        'class_dark' => 'required|string'
    ]);

    $newImageNames = [];

    if ($request->hasFile('image')) {
        // Delete old images
        if ($logo->image) {
            $oldImages = explode(',', $logo->image);
            foreach ($oldImages as $oldImg) {
                $path = 'logo/images/' . $oldImg;
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Upload new images
        foreach ($request->file('image') as $file) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('logo/images', $name, 'public');
            $newImageNames[] = $name;
        }

        // Save new image paths to validated data
        $validated['image'] = implode(',', $newImageNames);
    }

    // Update the logo with new validated data
    $logo->update($validated);

    return redirect()->route('logo.index')->with('success', 'Logo updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $logo=Logo::findOrFail($id);
        $user = auth()->user();
        if ($logo->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Not Authorized');
         }
       $logo->delete();
       return redirect()->route('logo.index')->with('success','logo deleted');
    }

}
