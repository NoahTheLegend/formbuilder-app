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
        Schema::table('admin_form_manager', function (Blueprint $table) {
            $table->string('new_column')->nullable();
        });
    }   

    public function down(): void
    {
        Schema::table('admin_form_manager', function (Blueprint $table) {
            $table->dropColumn('new_column');
        });
    }
};
