<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = [
        'target_url'
    ];

    protected $hidden = [
        'id'
    ];
}
