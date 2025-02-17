<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
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

        static::creating(function ($event) {
            $event->event_slug = Str::slug($event->events_title, '-');
        });

        // Auto-update slug when updating the title
        static::updating(function ($event) {
            if ($event->isDirty('events_title')) { // Check if title is changed
                $event->event_slug = Str::slug($event->events_title, '-');
            }
        });
    }
}
