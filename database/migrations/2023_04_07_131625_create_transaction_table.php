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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascacadeOnDelete()->cascacadeOnUpdate();
            $table->foreignId('kamar_id')->references('id')->on('data_kamar')->constrained()->cascacadeOnDelete()->cascacadeOnUpdate();
            $table->foreignId('rekening_id')->references('id')->on('rekening')->constrained()->cascacadeOnDelete()->cascacadeOnUpdate();
            $table->string('kode_pemesanan');
            $table->string('nama_pemesan');
            $table->string('nik');
            $table->date('tgl_pemesanan');
            $table->string('durasi_sewa');
            $table->string('harga_kamar');
            $table->date('tgl_bayar')->nullable();
            $table->string('total_pembayaran');
            $table->string('status_penyewaan')->default('PENDING');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
