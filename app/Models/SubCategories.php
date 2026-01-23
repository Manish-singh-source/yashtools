<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{
    //
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

        static::creating(function ($subcategories) {
            $subcategories->subcategory_slug = self::generateUniqueSlug($subcategories->sub_category_name, 'subcategory_slug');
        });

        static::updating(function ($subcategories) {
            if ($subcategories->isDirty('sub_category_name')) {
                $subcategories->subcategory_slug = self::generateUniqueSlug($subcategories->sub_category_name, 'subcategory_slug', $subcategories->id);
            }
        });
    }

    /**
     * Generate a unique slug for the given name
     */
    private static function generateUniqueSlug($name, $slugColumn = 'subcategory_slug', $excludeId = null)
    {
        $slug = Str::slug($name, '-');
        $originalSlug = $slug;
        $count = 1;

        // Check if slug already exists (excluding current record for updates)
        while (self::where($slugColumn, $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                $query->where('id', '!=', $excludeId);
            })
            ->exists()
        ) {

            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function productsCount()
    {
        return $this->hasMany(Product::class, 'product_sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
