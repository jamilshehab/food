<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=['user_id','menu_id','quantity'];

    public function menu(){
        return $this->belongsToMany(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
