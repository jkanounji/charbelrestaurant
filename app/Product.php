<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;

    public function products_carts()
    {
        return $this->hasMany('App\ProductsCart');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
