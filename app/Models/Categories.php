<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($categories) {
            $categories->category_slug = Str::slug($categories->category_name, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($categories) {
            if ($categories->isDirty('category_name')) { // Check if title is changed
                $categories->category_slug = Str::slug($categories->category_name, '-');
            }
        });
    }

    public function productsCount()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
