<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    public function solicitor()
    {
        return $this->belongsTo(User::class);
    }

    public function practice_area()
    {
        return $this->belongsTo(PracticeAreas::class);
    }
}
