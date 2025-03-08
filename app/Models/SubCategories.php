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
