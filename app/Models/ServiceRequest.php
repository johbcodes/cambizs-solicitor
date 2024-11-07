<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'practice_area_id',
        'details',
        'solicitor_id',
        'client_id',
        'status'
    ];
    public function solicitor()
    {
        return $this->belongsTo(User::class);
    }

    public function practice_area()
    {
        return $this->belongsTo(PracticeAreas::class);
    }
}
