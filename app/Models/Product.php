<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function categories() {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }
    

    public function subcategories() {
        return $this->belongsTo(SubCategories::class, 'product_sub_category_id');
    }
    

    public function brands() {
        return $this->belongsTo(Brand::class, 'product_brand_id');
    }
}
