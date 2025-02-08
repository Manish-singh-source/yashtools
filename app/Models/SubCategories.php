<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    //
    public function category(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
