<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryProducts extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }
}
