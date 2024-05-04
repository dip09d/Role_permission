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
        Schema::create('pref_project_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->tinyInteger('is_visible_anyone')->nullable();
            $table->tinyInteger('is_visible_private')->nullable();
            $table->tinyInteger('is_visible_invite')->nullable();
            $table->tinyInteger('is_hourly')->nullable();
            $table->tinyInteger('is_fixed')->nullable();
            $table->float('budget', 10, 2)->nullable();
            $table->tinyInteger('experience_level')->nullable();
            $table->char('hourly_duration', 10)->nullable();
            $table->char('hourly_time_required', 10)->nullable();
            $table->char('project_type_code', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_project_settings');
    }
};
