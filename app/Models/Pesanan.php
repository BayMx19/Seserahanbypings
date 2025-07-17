<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 't_pesanan';

    protected $fillable = [
        'pembeli_id',
        'kode_invoice',
        'tanggal_pesanan',
        'tanggal_acara',
        'total_harga',
        'status_pesanan',
    ];

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'pesanan_id');
    }
    
}
