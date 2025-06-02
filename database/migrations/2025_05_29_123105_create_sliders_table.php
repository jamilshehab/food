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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title');
            $table->foreignId('user_id')->constrained()->onDelete(action: 'cascade');
            $table->text('slider_content')->text('')->nullable();
            $table->string('slider_image')->nullable();    
            $table->string('anchor_link')->nullable();
            $table->string('anchor_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider');
    }
};
