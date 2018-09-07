<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
