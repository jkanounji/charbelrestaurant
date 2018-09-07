<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsCart extends Model
{
    use softDeletes;

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
