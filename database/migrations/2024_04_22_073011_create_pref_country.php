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
        Schema::create('pref_country', function (Blueprint $table) {
            $table->increments('country_id');
            $table->char('country_code', 13)->default('');
            $table->char('country_code_short', 2)->default('');
            $table->string('currency_code', 5);
            $table->tinyInteger('country_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_country');
    }
};
