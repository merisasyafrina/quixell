<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collections extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photo',
        'price',
    ];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
