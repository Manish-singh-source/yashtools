<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];


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

        static::creating(function ($event) {
            $event->event_slug = self::generateUniqueSlug($event->events_title, 'event_slug');
        });

        static::updating(function ($event) {
            if ($event->isDirty('events_title')) {
                $event->event_slug = self::generateUniqueSlug($event->events_title, 'event_slug', $event->id);
            }
        });
    }

    /**
     * Generate a unique slug for the given title
     */
    private static function generateUniqueSlug($title, $slugColumn = 'event_slug', $excludeId = null)
    {
        $slug = Str::slug($title, '-');
        $originalSlug = $slug;
        $count = 1;

        // Keep checking until we find a unique slug
        while (static::where($slugColumn, $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                $query->where('id', '!=', $excludeId);
            })
            ->whereNull('deleted_at') // Handle soft deletes
            ->exists()
        ) {

            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
