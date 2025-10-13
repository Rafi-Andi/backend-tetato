<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    protected $guarded = ['id'];

    public function pesanan_details():HasMany{
        return $this->hasMany(PesananDetail::class);
    }
}
