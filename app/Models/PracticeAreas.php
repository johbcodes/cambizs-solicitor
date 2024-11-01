<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticeAreas extends Model
{
    public function service_requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
