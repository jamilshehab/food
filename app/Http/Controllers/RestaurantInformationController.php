<?php

namespace App\Http\Controllers;

use App\Models\RestaurantInformation;
use Illuminate\Http\Request;

class RestaurantInformationController extends Controller
{
    //
    public function index(){
        $userId=auth()->id();
        $footerInfo = RestaurantInformation::where(column: 'user_id', operator: '=', value: $userId)->get()->first();
        return view('footer.footer',compact('footerInfo'));
    }
    public function create(){
        return view('footer.form.add');
    }
    
    public function store(Request $request){
    $validated=$request->validate([
    'open_hours_weekdays'=>'required|string',       
    'open_hours_weekends'=>'required|string',       
    'reservation_title'=>'required|string',        
    'phone_number'=>'required|string',             
    'email_input'=>'required|string',              
    'address_line_1'=>'required|string',         
    'address_line_2'=>'required|string',     
    'footer_description'=>'required|string',      
    'images'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'social_links'=>'required|string'              
    ]);
    if ($request->hasFile('images')){
       $validated['images'] = $request->file('images')->store('footer/images', 'public');         
    }
    $userId=auth()->id();
    $validated['user_id'] =$userId;
    RestaurantInformation::create($validated);
    }

    public function edit($id){
        $user=auth()->user();
        $footerInfo=RestaurantInformation::findOrFail($id);
        if($footerInfo->user_id !== $user->id){
           return redirect()->back()->with('error', 'Not Authourized');
        }

        return view('footer.form.edit');

    }

    public function update(Request $request, string $id)
{
    $user = auth()->user();
    $footer =RestaurantInformation::findOrFail($id);

    $validated = $request->validate([
        'open_hours_weekdays'   => 'required|string',
        'open_hours_weekends'   => 'required|string',
        'reservation_title'     => 'required|string',
        'phone_number'          => 'required|string',
        'email_input'           => 'required|string|email',
        'address_line_1'        => 'required|string',
        'address_line_2'        => 'required|string',
        'footer_description'    => 'required|string',
        'images'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'social_links'          => 'required|string'
    ]);

    // Find the model by ID

    // Handle file upload
    if ($request->hasFile('images')) {
        $fileName = 'footer_' . md5(now()) . '.' . $request->file('images')->extension();
        $request->file('images')->storeAs('footer/images', $fileName, 'public');
        $validated['images'] = $fileName;
    }

    // Update the model
    $footer->update($validated);

    return redirect()->back()->with('success', 'Footer updated successfully.');
}

public function destroy(string $id){
    $footer=RestaurantInformation::findOrFail($id);
    $user=auth()->user();
    if ($footer->user_id!==$user->id){
    return redirect()->route('footer.index')->with('success','footer deleted');

    }
}
}
