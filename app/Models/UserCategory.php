<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    //
    protected $table = 'user_categories';

    protected $fillable = [
        'user_id',
        'category_id',
    ];
    
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategories::class, 'sub_category_id', 'id');
    }
}
