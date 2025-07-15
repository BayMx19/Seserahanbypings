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
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembeli_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_invoice')->unique();
            $table->dateTime('tanggal_pesanan');
            $table->date('tanggal_acara')->nullable();
            $table->bigInteger('total_harga');
            $table->string('status_pesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pesanan');
    }
};
