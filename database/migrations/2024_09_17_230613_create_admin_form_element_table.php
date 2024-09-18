<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admin_form_elements', function (Blueprint $table) {
            $table->id();
            $table->json('element_data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_form_elements');
    }
};
