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
        Schema::create('pref_city_names', function (Blueprint $table) {
            $table->tinyInteger('city_id')->primary();
            $table->string('city_name');
            $table->string('description');
            $table->string('city_lang', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_city_names');
    }
};
