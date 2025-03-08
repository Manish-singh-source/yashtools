<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at'];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->product_slug = Str::slug($product->product_name, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($product) {
            if ($product->isDirty('product_name')) { // Check if title is changed
                $product->product_slug = Str::slug($product->product_name, '-');
            }
        });
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }


    public function subcategories()
    {
        return $this->belongsTo(SubCategories::class, 'product_sub_category_id');
    }


    public function brands()
    {
        return $this->belongsTo(Brand::class, 'product_brand_id');
    }
}
