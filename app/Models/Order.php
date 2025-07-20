<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
protected $fillable=['menu_id','user_id','order_id','total','firstName','lastName','country','city','email','phone_number','country','billing','address'];


public function menus() {
    return $this->belongsToMany(Menu::class, 'order_items')
        ->withPivot('quantity')
        ->withTimestamps();
}


}
