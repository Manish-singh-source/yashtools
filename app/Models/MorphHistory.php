<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MorphHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
