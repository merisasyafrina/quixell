<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photo',
        'price',
    ];
}
