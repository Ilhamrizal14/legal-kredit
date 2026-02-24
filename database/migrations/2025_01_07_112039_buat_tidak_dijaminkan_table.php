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
        Schema::create('tidak_dijaminkan', function (Blueprint $table) {
            $table->id('id'); // This will create an auto-incrementing unsigned integer primary key.
            $table->string('nomor_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('tujuan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('dokumentasi_db')->nullable();
            $table->timestamps(); // created_at and updated_at timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tidak_dijaminkan');
    }
};
