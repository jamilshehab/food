<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\About;

class AboutImage extends Model
{
    //
    protected $fillable=['images','about_id'];


    public function about(){
        return $this->belongsTo(About::class);
    }
}
