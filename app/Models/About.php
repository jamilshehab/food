<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
 class About extends Model
{
    //
    protected $fillable=['title','content','images','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
