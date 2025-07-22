<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
protected $fillable=['user_id','total','first_name','last_name','country','city','email','phone_number','address','payment','company'];


public function menus() {
    return $this->belongsToMany(Menu::class, 'order_items')
        ->withPivot('quantity')
        ->withTimestamps();
}


}
