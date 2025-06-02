<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Slider extends Model
{
    //
    protected $fillable=['slider_title','slider_content','slider_image','anchor_link','anchor_text','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
