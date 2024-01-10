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
        Schema::create('company_users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('active')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
            $table->text('address')->nullable();
            $table->string('passport_num')->nullable();
            $table->string('passport_date')->nullable();
            $table->string('visa_num')->nullable();
            $table->string('visa_date')->nullable();
            $table->string('visa_period')->nullable();
            $table->string('state')->nullable();
            $table->string('token')->nullable();
            $table->integer('token_expiry')->nullable();
            $table->text('device_token')->nullable();
            $table->enum('isactive', ['android','ios'])->default('android');
            $table->double('latitude', 15, 8);
            $table->double('longitude', 15, 8);
            $table->string('timezone')->default('UTC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_users');
    }
};
