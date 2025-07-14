<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = [
        'pesanan_id',
        'rating',
        'review_text',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
