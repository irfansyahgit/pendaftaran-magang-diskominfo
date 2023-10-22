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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nik');
            $table->string('alamat');
            $table->integer('telepon');
            $table->string('email');
            $table->string('universitas');
            $table->string('mulai');
            $table->string('selesai');
            $table->longText('keterangan')->nullable();
            $table->string('berkas_ktp');
            $table->string('berkas_ktm');
            $table->string('berkas_permohonan');
            $table->string('berkas_proposal');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('institution_id')->constrained()->onDelete('cascade');
            $table->foreignId('stat_id')->constrained()->onDelete('cascade');
            $table->longText('keterangan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
