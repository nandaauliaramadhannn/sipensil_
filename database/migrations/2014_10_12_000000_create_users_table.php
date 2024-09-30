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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_operator')->nullable();
            $table->string('nik')->nullable()->unique();
            $table->string('no_wa')->nullable()->unique();
            $table->string('alamat')->nullable();
            $table->string('ktp')->nullable();
            $table->string('akte')->nullable();
            $table->string('surat')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['user','admin','lembaga']);
            $table->string('password');
            $table->uuid('lembaga_id')->nullable();
            $table->foreign('lembaga_id')->references('id')->on('lembaga')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('last_seen')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
