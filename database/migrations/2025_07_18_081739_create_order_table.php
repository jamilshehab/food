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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
             $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('address'); 
            $table->string('phone_number');
            $table->string('company');
            $table->string('country');
            $table->string('city');
            $table->string('payment')->default('cash_on_delivery');
            $table->decimal(column: 'total')->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
