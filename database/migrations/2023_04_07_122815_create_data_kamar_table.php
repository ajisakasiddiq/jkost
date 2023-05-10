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
        Schema::create('data_kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->references('id')->on('data_kost')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('jenis_kamar');
            $table->integer('no_kamar');
            $table->integer('harga');
            $table->enum('status', ['1', '2', '3', '4'])->comment('1=tersedia, 2=disewa, 3=pending, 4=batal');
            $table->string('img_pertama');
            $table->string('img_kedua');
            $table->string('img_ketiga');
            $table->string('img_keempat');
            $table->string('deskripsi');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kamar');
    }
};
