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
        Schema::create('jaminan_keluar', function (Blueprint $table) {
            $table->id('id'); // This will create an auto-incrementing unsigned integer primary key.
            $table->date('tgl_keluar')->nullable();
            $table->string('nama')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('jenis_jaminan')->nullable();
            $table->string('no_registrasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('jumlah_jaminan')->nullable();
            $table->timestamps(); // created_at and updated_at timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jaminan_keluar');
    }
};
