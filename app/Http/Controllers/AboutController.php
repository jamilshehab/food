<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\AboutImage;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $about = About::where('user_id', auth()->id())->first();

    return view('about.view', compact('about'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

       return view('about.add' );
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('images')) {
     $validated['images'] = $request->file('images')->store('about/images', 'public');         
    }

    About::create($validated);
    return redirect()->route('about.view')->with('success', 'About created successfully with images.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about=About::findOrFail($id);
         if($about->user_id !== $about->id){
        return redirect()->back()->with('error', 'Not Authourized');
        }
        return view('about.edit')->with(['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $user = auth()->user();
    $about = About::findOrFail($id);
  
    // Authorization check (assuming sliders have a user_id column)
    if ($about->user_id !== $user->id) {
        return redirect()->back()->with('error', 'Not Authorized');
    }

   $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
   
    // Handle file upload
    if ($request->hasFile('images')) {
        $fileName = 'about_'.md5(date('YmdHis')).'.'.$request->file('image')->extension();
        $request->file('images')->storeAs('public/about', $fileName);
        $validated['images'] = $fileName; // Store only filename
    }

    $about->update($validated);
    return redirect()->route('about.view')->with('success', 'About Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $about=About::findOrFail($id);
        $user = auth()->user();
        if ($about->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Not Authorized');
       }
       $about->delete();
       return redirect()->route('about.view')->with('success','about deleted');
    }
}
