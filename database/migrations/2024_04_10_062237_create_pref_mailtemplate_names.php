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
        Schema::create('pref_mailtemplate_names', function (Blueprint $table) {
            $table->increments('template_id');
            $table->string('template_subject', 250);
            $table->text('template_content');
            $table->char('lang', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_mailtemplate_names');
    }
};
