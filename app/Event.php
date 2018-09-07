<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use softDeletes;

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
