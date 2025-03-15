<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MorphStatus extends Model
{
    //
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-M-d');
    }

    public function morphables(): MorphTo
    {
        return $this->morphTo();
    }

}
