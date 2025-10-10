<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    protected $guarded = ['id'];

    public function kategori():BelongsTo {
        return $this->BelongsTo(Kategori::class);
    }
}
