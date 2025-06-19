<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId=auth()->id();
        $navigation = Navigation::where('user_id', $userId)->latest()->paginate(8);
        return view('navigation.navbar',compact('navigation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('navigation.form.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated=$request->validate([
            'title'=>'required|string',
            'url'=>'required|string',
        ]);
          
        $validated['user_id'] = auth()->id();
        Navigation::create($validated);
        return redirect()->route('header.index')->with('success','created successfully');
        
    }
 
    public function edit(string $id)
    {
        //
        $user=auth()->user();
        $navigation=Navigation::findOrFail($id);
        if ($navigation->user_id !==$user->id){
          abort(403,'anuthorized access');
        }
        return view('navigation.form.edit',compact('navigation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       $user = auth()->user();
    $navigation = Navigation::findOrFail($id);

    // Correct authorization check
    if ($navigation->user_id !== $user->id) {
        abort(403, 'Unauthorized user access');
    }

    $validated = $request->validate([
        'title' => 'required|string',
        'url' => 'required|string',
    ]);

    $navigation->update($validated);

    return redirect()->route('header.index')->with('success', 'Navigation updated successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $navigation=Navigation::findOrFail($id);
        $user=auth()->user();
        if($navigation->user_id !==$user->id){
            abort(403,'unauthorized access');
        }
        $navigation->delete();
        return redirect()->route('navigation.navbar')->with('success','navigation links deleted');
    }
}
