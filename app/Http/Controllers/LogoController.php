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
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       
        ]);

        // Handle logo_light upload
        if ($request->hasFile('logo_light')) {
            $logoLightFile = $request->file('logo_light'); // Get the actual file object for logo_light
            $fileNameLight = 'logo_light_' . time() . '.' . $logoLightFile->extension(); // Use $logoLightFile
            
            // Store the file in the 'public' disk (usually storage/app/public)
            $pathLight = $logoLightFile->storeAs('logos', $fileNameLight, 'public'); // Store in 'logos' directory
            
            // Save the public URL to the database for logo_light
            $validated['logo_light'] = Storage::url($pathLight);
        }

        // Handle logo_dark upload
        if ($request->hasFile('logo_dark')) {
            $logoDarkFile = $request->file('logo_dark'); // Get the actual file object for logo_dark
            $fileNameDark = 'logo_dark_' . time() . '.' . $logoDarkFile->extension(); // Use $logoDarkFile
            
            // Store the file in the 'public' disk (usually storage/app/public)
            $pathDark = $logoDarkFile->storeAs('logos', $fileNameDark, 'public'); // Store in 'logos' directory
            
            // Save the public URL to the database for logo_dark
            $validated['logo_dark'] = Storage::url($pathDark);
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
        'logo_light' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // 3. If new logo_light uploaded
    if ($request->hasFile('logo_light')) {
        // Delete old one if exists
        if ($logo->logo_light && Storage::disk('public')->exists($logo->logo_light)) {
            Storage::disk('public')->delete($logo->logo_light);
        }
        // Store new one
        $validated['logo_light'] = $request->file('logo_light')->store('logo_light/images', 'public');
    }

    // 4. If new logo_dark uploaded
    if ($request->hasFile('logo_dark')) {
        // Delete old one if exists
        if ($logo->logo_dark && Storage::disk('public')->exists($logo->logo_dark)) {
            Storage::disk('public')->delete($logo->logo_dark);
        }

        // Store new one
        $validated['logo_dark'] = $request->file('logo_dark')->store('logo_dark/images', 'public');
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
