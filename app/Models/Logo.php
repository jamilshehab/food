<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Logo extends Model
{
    //
    protected $fillable=['image','user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
