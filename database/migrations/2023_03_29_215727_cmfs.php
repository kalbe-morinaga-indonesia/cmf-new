<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cmfs', function (Blueprint $table) {
            $table->id();
            $table->string('no_cmf')->unique();
            $table->string('slug')->unique();
            $table->string('judul_perubahan');
            $table->string('perubahan');
            $table->date('tanggal');
            $table->string('jenis_perubahan');
            $table->date('target_implementasi');
            $table->string('tipe_perubahan');
            $table->text('alasan_perubahan');
            $table->text('dampak_terhadap_perubahan');
            $table->text('deskripsi_perubahan');
            $table->string('status_pengajuan')->default('dikirim');
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subdepartment_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('step')->default(1);
            $table->string('inserted_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('');
    }
};
