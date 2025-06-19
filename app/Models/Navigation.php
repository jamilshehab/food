<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Navigation extends Model
{
    //
  protected $fillable=['title','url','user_id'];

  
  public function users(){
   return $this->belongsTo(User::class);
  }
}
