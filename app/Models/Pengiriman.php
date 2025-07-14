<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
        'pesanan_id',
        'metode_pengiriman',
        'tanggal_pengiriman',
        'tanggal_diterima',
        'status_pengiriman',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
