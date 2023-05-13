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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('number', 16)->nullable();
            $table->foreignId('user_id')->constrained()->cascacadeOnDelete()->cascacadeOnUpdate();
            $table->foreignId('kamar_id')->references('id')->on('data_kamar')->constrained()->cascacadeOnDelete()->cascacadeOnUpdate();
            $table->string('nama_pemesan');
            $table->string('durasi_sewa');;
            $table->string('total_price');
            $table->date('tgl_sewa');
            $table->enum('status', ['unpaid', 'paid', 'batal']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
