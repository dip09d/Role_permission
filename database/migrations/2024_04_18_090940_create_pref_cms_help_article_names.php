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
        Schema::create('pref_cms_help_article_names', function (Blueprint $table) {
            $table->unsignedBigInteger('cms_help_article_id');
            $table->string('lang', 10);
            $table->string('title', 255);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_cms_help_article_names');
    }
};
