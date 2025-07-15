<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHarga extends Model
{
    use HasFactory;
    protected $table = 'produk_harga';
    protected $fillable = [
        'product_id',
        'layanan',
        'harga',
    ];
    public function product()
    {
        return $this->belongsTo(Produk::class);
    }
}
