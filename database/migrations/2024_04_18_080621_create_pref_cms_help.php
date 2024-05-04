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
        Schema::create('pref_cms_help', function (Blueprint $table) {
            $table->tinyInteger('cms_help_id');
            $table->string('cms_help_slug');
            $table->unsignedBigInteger('parent_id');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_cms_help');
    }
};
