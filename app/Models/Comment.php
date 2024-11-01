<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function review()
    {
        return $this->belongsTo(Reviews::class);
    }
}
