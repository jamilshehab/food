<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AboutImage;
class About extends Model
{
    //
    protected $fillable=['title','content','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->hasMany(AboutImage::class);
    }
}
