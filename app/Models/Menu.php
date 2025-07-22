<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Menu extends Model
{
    //
    protected $fillable=['menu_id','title','description','ingredients','image','price','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
 
    public function carts()
    {
    return $this->belongsToMany(Cart::class, 'cart_items')
                ->withPivot('quantity')
                ->withTimestamps();
    }
    
    public function order(){
     return $this->belongsToMany(Order::class, 'order_items')
                ->withPivot('quantity','price')
                ->withTimestamps(); 
    }
}
