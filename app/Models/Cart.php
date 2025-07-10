<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=['user_id','total'];
 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menus() {
    return $this->belongsToMany(Menu::class, 'cart_items')
        ->withPivot('quantity')
        ->withTimestamps();
    }
}
