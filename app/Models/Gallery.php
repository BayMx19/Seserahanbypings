<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'm_gallery';

    protected $guarded = [
        'id',
        'judul',
        'kategori',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_event',
        'user_id',
        'is_published',
        'created_at',
        'updated_at',
    ];
}