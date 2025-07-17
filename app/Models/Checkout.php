<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    protected $fillable=['menu_id','cart_id','user_id','total','phone_number','city','email','company','address',
'payment_methods','delivery_methods','coupons'];

public function cart(){
    return $this->belongsTo(Cart::class);
}


}
