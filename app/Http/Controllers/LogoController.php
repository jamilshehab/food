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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',       
        ]);

        // Handle logo_light upload
        if ($request->hasFile('image')) {        
          $validated['image'] = $request->file('image')->store('logo','public');
        }
 
        $validated['user_id'] = auth()->id();

        Logo::create($validated);

        return redirect()->route('logo.index')->with('success', 'Logo created successfully!');
    }

   public function edit(Logo $logo)
    {
        $userId=auth()->user()->id;
        
        if($logo->user_id !==$userId){
          return redirect()->back()->with('error', 'Not Authourized');
        }
        return view('logo.form.edit')->with(['logo' => $logo]);
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Logo $logo)
{ 
    // 2. Validate the new images (optional)
    $validated = $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

 
    // 4. If new logo_dark uploaded
    if ($request->hasFile('image')) {
        // Delete old one if exists
        if ($logo->image && Storage::disk('public')->exists($logo->image)) {
            Storage::disk('public')->delete($logo->image);
        }

        // Store new one
        $validated['image'] = $request->file('image')->store('logo','public');
    }

    // 5. Update the model with new image paths (if any)
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
