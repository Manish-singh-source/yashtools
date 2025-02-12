<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public function productsCount()
    {
        return $this->hasMany(Product::class, 'product_brand_id');
    }
}
