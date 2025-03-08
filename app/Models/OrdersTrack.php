<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersTrack extends Model
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

    public function orders()
    {
        return $this->hasMany(Enquiry::class, 'enquiry_id', 'enquiry_id');
    }

    public function products()
    {
        return $this->hasMany(EnquiryProducts::class,  'enquiry_id');
    }
}
