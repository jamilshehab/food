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
            $table->foreignId('user_id')->constrained()->onDelete(action: 'cascade');
            $table->text('open_hours_weekdays')->nullable();    
            $table->text('open_hours_weekends')->nullable();   
            $table->text('phone_number')->nullable();
            $table->text('email_input')->nullable();
            $table->text('address_line_1')->nullable();
            $table->text('address_line_2')->nullable();
            $table->text('footer_description')->nullable();  
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
