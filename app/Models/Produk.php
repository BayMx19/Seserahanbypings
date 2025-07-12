<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
     protected $table = 'm_produk';
     protected $fillable = [
        'nama_produk',
        'harga_jual',
        'harga_sewa',
        'stok',
        'deskripsi',
        'gambar',
        'kategori',
        'status_produk',
     ];

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }
}
