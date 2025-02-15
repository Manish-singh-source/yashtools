<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    //
    public static function boot()
    {
        parent::boot();

        static::creating(function ($subcategories) {
            $subcategories->subcategory_slug = Str::slug($subcategories->sub_category_name, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($subcategories) {
            if ($subcategories->isDirty('sub_category_name')) { // Check if title is changed
                $subcategories->subcategory_slug = Str::slug($subcategories->sub_category_name, '-');
            }
        });
    }

    public function productsCount() {
        return $this->hasMany(Product::class, 'product_sub_category_id');
    }

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
