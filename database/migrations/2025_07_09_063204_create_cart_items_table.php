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
        Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cart_id')->constrained()->onDelete('cascade');
        $table->foreignId('menu_id')->constrained()->onDelete('cascade');
        $table->integer('quantity')->default(1);
        $table->timestamps();
        $table->unique(['cart_id', 'menu_id']); // Prevent duplicate entries
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
