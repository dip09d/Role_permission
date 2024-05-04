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
        Schema::create('pref_adminmenu', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('title', 150)->comment('Menu Title');
            $table->string('url', 200)->nullable();
            $table->string('menu_desc', 200)->default('');
            $table->string('style_class', 100)->default('i-menu-6');
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('status')->nullable();
            $table->enum('show_left', ['Y', 'N'])->default('Y');
            $table->integer('ord')->default(0);
            $table->string('menu_code', 20);
            $table->string('action', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_adminmenu');
    }
};
