<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Slider;
use App\Models\Menu;
use App\Models\Navigation;
use App\Models\Logo;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function slider(){
        return $this->hasMany(Slider::class);
    }
    
    public function about(){
        return $this->hasOne(About::class);
    }

    public function menu(){
        return $this->hasMany(Menu::class);
    }

    public function footerInfo(){
        return $this->hasOne(RestaurantInformation::class);
    }
   
    public function navigation(){
        return $this->hasMany(Navigation::class);
    }

    public function logo(){
        return $this->hasOne(Logo::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class)
        ->with('menus');
    }

    public function order(){
        return $this->hasMany(Order::class)->with('menus');;
    }
    
}
