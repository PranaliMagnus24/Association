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
        Schema::create('documentuploads', function (Blueprint $table) {
            $table->id();
            $table->string('company_identity')->nullable();
            $table->string('aadharcard')->nullable();
            $table->string('company_address')->nullable();
            $table->string('authority_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentuploads');
    }
};
