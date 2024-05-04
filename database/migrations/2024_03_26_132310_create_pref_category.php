<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('pref_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_key')->nullable();
            $table->string('name');
            $table->string('category_thumb')->nullable();
            $table->string('category_icon')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('category_order')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->tinyInteger('show_in_footer')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_category');
    }
};
