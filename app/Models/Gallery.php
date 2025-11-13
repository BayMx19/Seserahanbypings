<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'm_gallery';

    protected $guarded = [
        'id',
    ];
}
