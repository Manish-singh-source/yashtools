<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
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
