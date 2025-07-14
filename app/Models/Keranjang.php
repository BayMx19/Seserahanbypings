<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 't_keranjang';

    protected $fillable = [
        'produk_id',
        'pembeli_id',
        'kategori_harga_id',
        'qty',
        'status',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function kategoriHarga()
    {
        return $this->belongsTo(ProdukHarga::class, 'kategori_harga_id');
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    public function detailPesanan()
    {
        return $this->hasOne(DetailPesanan::class);
    }
}
