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
        Schema::create('pref_testimonial', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->string('logo', 150);
            $table->tinyInteger('testimonial_status');
            $table->integer('display_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_testimonial');
    }
};
