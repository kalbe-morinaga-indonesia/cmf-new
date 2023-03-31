<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cmf_subdepartment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cmf_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subdepartment_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cmf_subdepartment');
    }
};
