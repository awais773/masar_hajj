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
        Schema::table('users', function (Blueprint $table) {
            $table->string('country_name')->nullable();
            $table->string('country_image')->nullable();
            $table->string('company_logo')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country_name')->nullable();
            $table->string('country_image')->nullable();
            $table->string('company_logo')->nullable();
            $table->softDeletes();
        });
    }
};
