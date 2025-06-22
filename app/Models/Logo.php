<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Logo extends Model
{
    //
    protected $fillable=['logo_light','user_id','logo_dark'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
