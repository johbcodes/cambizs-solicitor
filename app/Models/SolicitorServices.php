<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitorServices extends Model
{
    public function solicitor()
    {
        return $this->belongsTo(User::class);
    }
}
