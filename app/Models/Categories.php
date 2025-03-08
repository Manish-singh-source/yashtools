<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
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
