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
        Schema::create('t_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('t_pesanan')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('m_produk')->onDelete('cascade');
            $table->tinyInteger('rating'); 
            $table->longtext('review_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_review');
    }
};
