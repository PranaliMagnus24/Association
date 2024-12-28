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
        Schema::create('companyprofile', function (Blueprint $table) {
            $table->id();
            $table->string('company_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('aadharcard_number')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('renewal_date')->nullable();
            $table->string('address_one')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->integer('zipcode')->nullable();
            $table->integer('landline')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('company_year')->nullable();
            $table->string('about_company')->nullable();
            $table->string('website_url')->nullable();
            $table->string('technologies')->nullable();
            $table->string('company_logo')->nullable();
            $table->integer('tech_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('zip_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyprofile');
    }
};
