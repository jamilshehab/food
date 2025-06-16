<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantInformation extends Model
{
    //
    protected $fillable = [
    'open_hours_weekdays',      // e.g., "Monday - Friday: 10:00AM - 11:00PM"
    'open_hours_weekends',      // e.g., "Saturday - Sunday: 9:00AM - 1:00PM"
    'reservation_title',        // e.g., "Reservation"
    'phone_number',             // e.g., "+152 534-468-854"
    'email_input',              // e.g., "contact@example.com"
    'address_line_1',           // e.g., "C/54 Northwest Freeway,"
    'address_line_2',           // e.g., "Suite 558, USA 485"
    'footer_description',       // The long text in the middle
    'images',             // JSON: e.g., {"linkedin": "...", "facebook": "..."}
];

}
