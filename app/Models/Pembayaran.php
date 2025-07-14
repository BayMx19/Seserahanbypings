<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 't_pembayaran';

    protected $fillable = [
        'pesanan_id',
        'metode_pembayaran',
        'tanggal_pembayaran',
        'status_pembayaran',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
