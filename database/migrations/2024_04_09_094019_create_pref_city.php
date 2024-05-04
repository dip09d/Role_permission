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
        Schema::create('pref_city', function (Blueprint $table) {
            $table->integer('city_id')->primary();
            $table->string('city_key', 100);
            $table->tinyInteger('city_status');
            $table->integer('city_display_order');
            $table->string('city_thumb', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_city');
    }
};
