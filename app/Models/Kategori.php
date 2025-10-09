<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kategori extends Model
{
    protected $guarded = ['id'];

    public function produk():BelongsTo {
        return $this->belongsTo(Produk::class);
    }
}
