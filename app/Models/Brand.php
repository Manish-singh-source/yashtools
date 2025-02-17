<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public static function boot()
    {
        parent::boot();

        static::creating(function ($brand) {
            $brand->brand_slug = Str::slug($brand->brand_name, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($brand) {
            if ($brand->isDirty('brand_name')) { // Check if title is changed
                $brand->brand_slug = Str::slug($brand->brand_name, '-');
            }
        });
    }
    
    public function productsCount()
    {
        return $this->hasMany(Product::class, 'product_brand_id');
    }
}
