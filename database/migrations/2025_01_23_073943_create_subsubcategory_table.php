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
        Schema::create('subsubcategory', function (Blueprint $table) {
            $table->id();
            $table->string('subsubcategory_name');
            $table->string('description');
            $table->enum('status', ['active', 'inactive']);
            $table->string('category_id');
            $table->string('subcategory_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubcategory');
    }
};
