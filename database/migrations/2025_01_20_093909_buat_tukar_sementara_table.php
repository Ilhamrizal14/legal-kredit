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
        Schema::create('tukar_sementara', function (Blueprint $table) {
            $table->id('id'); // This will create an auto-incrementing unsigned integer primary key.
            $table->string('no_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('sebenarnya')->nullable();
            $table->string('yang_ditukar')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps(); // created_at and updated_at timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tukar_sementara');
    }
};
