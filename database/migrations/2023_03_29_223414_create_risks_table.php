<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cmf_id')->constrained()->cascadeOnDelete();
            $table->string('qcdsme');
            $table->string('resiko');
            $table->text('rencana_mitigasi');
            $table->text('rica');
            $table->text('pic');
            $table->date('deadline');
            $table->string('level_risk');
            $table->enum('status',['open','close']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('risks');
    }
};
