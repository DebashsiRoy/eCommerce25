<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable =[
        'title',
        'short_des',
        'price',
        'discount',
        'discount_price',
        'image',
        'stock',
        'star',
        'remark',
        'img1',
        'img2',
        'img3',
        'img4',
        'description',
        'color',
        'size',
        'category_id',
        'brand_id',
        'user_id',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

























