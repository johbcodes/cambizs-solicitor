<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitorServices extends Model
{
    protected $fillable = [
        'practice_area_id',
        'solicitor_id',
        'cost'
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
