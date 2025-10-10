<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $guarded = ['id'];

    public function kategories():HasMany {
        return $this->hasMany(Kategori::class);
    }
}
