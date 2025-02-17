<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
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
