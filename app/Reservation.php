<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use softDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
