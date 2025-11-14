<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'm_artikel';

    protected $guarded = [
        'id',
        'judul',
        'slug',
        'thumbnail',
        'user_id',
        'ringkasan',
        'isi',
        'kategori',
        'meta_title',
        'meta_description',
        'is_published',
        'published_at',
        'created_at',
        'updated_at'

    ];
}