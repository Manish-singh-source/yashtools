<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    //
    public function productsCount() {
        return $this->hasMany(Product::class, 'product_sub_category_id');
    }

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
