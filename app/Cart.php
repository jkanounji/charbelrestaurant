<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use softDeletes;

    public function products_cart()
    {
        return $this->hasMany('App\ProductsCart');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\ProductsCart');
    }
}
