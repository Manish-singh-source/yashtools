<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function productsCount() {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
