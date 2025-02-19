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
        Schema::create('membershipplan', function (Blueprint $table) {
            $table->id();
            $table->string('package_title');
            $table->string('plan_price');
            $table->string('package_term');
            $table->string('trial');
            $table->string('meta_keyword');
            $table->string('plan_image');
            $table->longtext('meta_description');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membershipplan');
    }
};
