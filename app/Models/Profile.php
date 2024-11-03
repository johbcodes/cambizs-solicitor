<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
