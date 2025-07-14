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
        Schema::create('t_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('t_pesanan')->onDelete('cascade');
            $table->string('metode_pengiriman');
            $table->dateTime('tanggal_pengiriman')->nullable();
            $table->dateTime('tanggal_diterima')->nullable();
            $table->string('status_pengiriman')->default('Belum Dikirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pengiriman');
    }
};
