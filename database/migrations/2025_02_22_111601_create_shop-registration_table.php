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
        Schema::create('shop-registration', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('shop_location')->nullable();
            $table->string('shop_logo')->nullable();
            $table->text('shop_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop-registration');
    }
};
