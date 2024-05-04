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
        Schema::create('pref_testimonial_names', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->char('name', 52);
            $table->string('company_name', 150);
            $table->text('description');
            $table->char('lang', 3)->default('en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_testimonial_names');
    }
};
