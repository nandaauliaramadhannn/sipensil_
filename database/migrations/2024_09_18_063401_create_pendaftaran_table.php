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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('pelatihan_id');
            $table->foreign('pelatihan_id')->references('id')->on('pelatihan')->onDelete('cascade');
            $table->string('jenis')->nullable();
            $table->string('tempat_latihan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->text('persyaratan')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('periode_awal')->nullable();
            $table->string('periode_akhir')->nullable();
            $table->string('kouta')->nullable();
            $table->string('images')->nullable();
            $table->enum('sifat', ['offline','online','blanded Learning','dll'])->nullable();
            $table->enum('status',['dibuka','ditutup','pending'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
