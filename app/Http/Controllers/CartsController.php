<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\ProductsCart;
use App\Order;
use App\OrderProduct;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::where('checked_out', 0)->get();
        $data = array
        (
            'title' => 'Welcome to MadreTest Carts Page',
            'pageDescription' => 'These are the currently active carts',
            'carts' => $carts
        ); 

        return view('carts.index')->with($data);
    }

    public function update($user_id)
    {
        $cart = Cart::where('checked_out', 0)->where('user_id', $user_id);
        $cart->checked_out = 1;
        $cart->save();
    }

    public function show($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->where('checked_out', 0)->first();
        $products_in_cart = $cart->products_cart;
        $total = 0;
        
        foreach ($products_in_cart as $product_in_cart)
        {
            $total += ($product_in_cart->product_price * $product_in_cart->quantity); 
        }

        $total = number_format($total);

        $data = array
        (
            'id' => $cart->id,
            'products_in_cart' => $cart->products_cart,
            'total' => $total
        );

        return view('carts.show')->with($data);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $products_in_cart = ProductsCart::where('cart_id', $id)->get();

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->address = 'mock';
        $order->save();

        if (count($products_in_cart) > 0)
        {
            foreach($products_in_cart as $product_in_cart)
            {
                $order_product = new OrderProduct;
                $order_product->order_id = $order->id;
                $order_product->product_id = $product_in_cart->product_id;
                $order_product->quantity = $product_in_cart->quantity;
                $order_product->product_name = $product_in_cart->product_name;
                $order_product->product_price = $product_in_cart->product_price;
                $order_product->save();
                $product_in_cart->delete();
            }
        }
        $cart->delete();
        $new_cart = new Cart;
        $new_cart->user_id = auth()->user()->id;
        $new_cart->save();

        return redirect('/')->with('success', 'Cart checked out');
    }
}
