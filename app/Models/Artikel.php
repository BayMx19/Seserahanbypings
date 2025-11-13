<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'm_artikel';

    protected $guarded = [
        'id',
    ];
}
