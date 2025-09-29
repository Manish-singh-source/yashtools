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

        static::creating(function ($category) {
        $category->category_slug = static::generateUniqueSlug($category->category_name);
    });

    static::updating(function ($category) {
        if ($category->isDirty('category_name')) {
            $category->category_slug = static::generateUniqueSlug($category->category_name, $category->id);
        }
    });
}

protected static function generateUniqueSlug($name, $ignoreId = null)
{
    $slug = Str::slug($name, '-');
    $originalSlug = $slug;
    $counter = 1;

    // Check across ALL rows including soft deleted
    while (static::withTrashed()
        ->where('category_slug', $slug)
        ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
        ->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }

    return $slug;
}

    public function productsCount()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
