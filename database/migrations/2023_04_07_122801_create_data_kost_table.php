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
        Schema::create('data_kost', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascacadeOnDelete()
                ->cascacadeOnUpdate();
            $table->string('nama_kost');
            $table->string('alamat');
            $table->string('deskripsi');
            $table->string('foto');
            $table->string('maps')->nullable();
            $table->string('status');
            $table->string('longitude');
            $table->string('latitude');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kost');
    }
};
