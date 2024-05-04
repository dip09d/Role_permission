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
        Schema::create('pref_mailtemplate', function (Blueprint $table) {
            $table->increments('template_id');
            $table->string('template_for', 200);
            $table->string('template_type', 150);
            $table->text('template_keys');
            $table->integer('display_order');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_mailtemplate');
    }
};
