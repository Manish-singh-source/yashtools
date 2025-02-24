<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
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

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function products()
    {
        return $this->hasMany(EnquiryProducts::class,  'enquiry_id');
    }

    public function enquiries() {
        return $this->hasOne(Enquiry::class, 'enquiry_id');
    }

    public function invoice() {
        return $this->hasOne(OrdersTrack::class, 'enquiry_id', 'enquiry_id');
    }
}
