<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
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


        static::creating(function ($banner) {
            $slugName = 'banner_' . time();
            $banner->slug = Str::slug($slugName, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($banner) {
            if ($banner->isDirty('slug')) { // Check if title is changed
                $slugName = 'banner_' . time();
                $banner->slug = Str::slug($slugName, '-');
            }
        });
    }
}
