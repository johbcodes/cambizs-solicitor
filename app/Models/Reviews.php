<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public function profile()
    {
        return $this->belongsTo(Profile::class, '', 'profile');
    }
    public function sender()
    {
        return $this->belongsTo(User::class, '', 'profile');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
