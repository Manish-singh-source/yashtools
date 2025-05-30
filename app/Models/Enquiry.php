<?php

namespace App\Models;

use App\Models\MorphStatus;
use App\Models\MorphHistory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Enquiry extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

    public function history()
    {
        return $this->morphMany(MorphHistory::class, 'modifiable');
    }
    public function statusMorph()
    {
        return $this->morphMany(MorphStatus::class, 'statusable');
    }
    public function notificationsMorph()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

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

    public function product()
    {
        return $this->belongsToMany(EnquiryProducts::class,  'enquiry_id');
    }

    public function enquiries()
    {
        return $this->hasOne(Enquiry::class, 'enquiry_id');
    }

    public function invoice()
    {
        return $this->hasOne(OrdersTrack::class, 'enquiry_id', 'enquiry_id');
    }
}
