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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('introduction')->nullable();
            $table->text('description')->nullable();
            $table->datetime('eventstartdatetime')->nullable();
            $table->datetime('eventenddatetime')->nullable();
            $table->datetime('registerstartdatetime')->nullable();
            $table->datetime('registerenddatetime')->nullable();
            $table->string('type')->nullable();
            $table->string('mode')->nullable();
            $table->string('upload')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
