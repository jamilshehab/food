<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SocialLinks extends Model
{
    //
    protected $fillable=['svg','url','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
