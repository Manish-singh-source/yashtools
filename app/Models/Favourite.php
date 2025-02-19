<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
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

    public function products() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
