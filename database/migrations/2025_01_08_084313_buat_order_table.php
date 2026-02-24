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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id'); // This will create an auto-incrementing unsigned integer primary key.
            $table->string('nama')->nullable();
            $table->string('plafon')->nullable();
            $table->string('notariil')->nullable();
            $table->string('skmht')->nullable();
            $table->string('apht')->nullable();
            $table->string('fidusia')->nullable();
            $table->date('tgl_order')->nullable();
            $table->string('notaris')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps(); // created_at and updated_at timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
