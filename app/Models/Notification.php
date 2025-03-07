<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $dates = ['created_at', 'updated_at'];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d h:i A');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d h:i A');
    }
}
