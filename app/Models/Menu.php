<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Menu extends Model
{
    //
    protected $fillable=['title','content','image','price','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
