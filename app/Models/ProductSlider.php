<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSlider extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'short_des',
        'price',
        'image',
    ];
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
