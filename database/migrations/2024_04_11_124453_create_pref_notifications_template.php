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
        Schema::create('pref_notifications_template', function (Blueprint $table) {
            $table->id('notification_template_id');
            $table->string('template_key', 150);
            $table->string('template_for', 100);
            $table->text('all_template_keys');
            $table->integer('display_order');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_notifications_template');
    }
};
