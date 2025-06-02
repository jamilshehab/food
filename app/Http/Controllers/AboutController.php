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
        //
        $user=auth()->id();
        $about=About::where('user_id', $user)->get();
        return view('about.view', compact(var_name: 'about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->id();
        $about = About::where('user_id', $user)->first();

       return view('about.add' ,compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $about = About::create(array_merge($validated, [
        'user_id' => auth()->id()
    ]));

    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/about', 'public');
            $imagePaths[] = [
                'about_id' => $about->id,
                'images' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        AboutImage::insert($imagePaths);
    }

    return redirect()->route('about.view')->with('success', 'About created successfully with images.');
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
