<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantInformation extends Model
{
    //
    protected $fillable = [
    'open_hours_weekdays',    
    'open_hours_weekends',       
    'phone_number',            
    'email_input',               
    'address_line_1',            
    'address_line_2',          
    'footer_description',      
    'user_id'             
];

public function user(){
    return $this->belongsTo(User::class);
}

}
