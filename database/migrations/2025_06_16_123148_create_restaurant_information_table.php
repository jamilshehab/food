<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_information', function (Blueprint $table) {
            $table->id();
             $table->string('open_hours_weekdays')->nullable();    // e.g., "Monday - Friday: 10:00AM - 11:00PM"
            $table->string('open_hours_weekends')->nullable();    // e.g., "Saturday - Sunday: 9:00AM - 1:00PM"
            $table->string('reservation_title')->nullable();       // e.g., "Reservation"
            $table->string('phone_number')->nullable();
            $table->string('email_input')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->text('footer_description')->nullable();  
            $table->string('image')->nullable();      // full line under the sections
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_information');
    }
};
