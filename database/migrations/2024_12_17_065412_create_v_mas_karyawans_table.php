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
        Schema::create('v_mas_karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('NIK')->nullable();
            $table->string('barcode');
            $table->string('bidang');
            $table->string('unit');
            $table->string('jabatan');
            $table->string('no_ktp')->nullable();
            $table->string('bpjs_tk')->nullable();
            $table->string('bpjs_kes')->nullable();
            $table->string('kartu_kel')->nullable();
            $table->string('rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_str')->nullable();
            $table->string('masa_berlaku_str')->nullable();
            $table->string('no_sip')->nullable();
            $table->string('masa_berlaku_sip')->nullable();
            $table->string('sekolah_univ')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('resign')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_mas_karyawans');
    }
};
