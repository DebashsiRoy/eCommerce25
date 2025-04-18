<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brandName', 'brandImg', 'slug', 'user_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
