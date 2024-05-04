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
        Schema::create('pref_adminmenu_permission', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->string('menu_code', 20);
            $table->integer('role_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pref_adminmenu_permission');
    }
};
