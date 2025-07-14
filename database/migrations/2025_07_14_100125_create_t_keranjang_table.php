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
        Schema::create('t_keranjang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('m_produk')->onDelete('cascade');
            $table->foreignId('pembeli_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kategori_harga_id')->constrained('produk_harga')->onDelete('cascade');
            $table->integer('qty');
            $table->string('status')->default('Belum Checkout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
