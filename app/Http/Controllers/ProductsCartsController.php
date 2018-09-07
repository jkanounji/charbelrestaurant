<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsCart;
use App\Product;
use App\Cart;

class ProductsCartsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required|integer'
        ]);

        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $product_in_cart = ProductsCart::where('cart_id', $cart->id)->where('product_id', $request->input('product_id'))->first();
        $product = Product::find($request->input('product_id'));
        $message = ' quantity updated';

        if (count($product_in_cart) == 0)
        {
            $product_in_cart = new ProductsCart;
            $message = ' added to cart';
        }

        $product_in_cart->cart_id = $cart->id;
        $product_in_cart->product_id = $product->id;
        $product_in_cart->product_name = $product->name;
        $product_in_cart->product_price = $product->price;
        $product_in_cart->product_display_price = number_format($product->price);
        $product_in_cart->product_photo = $product->photo;
        $product_in_cart->product_description = $product->description;
        $product_in_cart->quantity = $request->input('quantity');
        $product_in_cart->save();

        return redirect('/carts/'.$cart->user_id)->with('success', $product->name.$message);
    }

    public function show($product_id)
    {
        $product = Product::find($product_id); 
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $product_in_cart = ProductsCart::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
        if (count($product_in_cart) == 0)
        {
            $product_in_cart = new ProductsCart;
            $product_in_cart->cart_id = $cart->id;
            $product_in_cart->product_id = $product->id;
            $product_in_cart->product_name = $product->name;
            $product_in_cart->product_price = $product->price;
            $product_in_cart->product_display_price = number_format($product->price);
            $product_in_cart->product_photo = $product->photo;
            $product_in_cart->quantity = 0;
        }
        return view('productscarts.edit')->with('product_in_cart', $product_in_cart);
    }

    public function edit($id)
    {
        $product_in_cart = ProductsCart::find($id);
        $product = Product::find($product_in_cart->product_id);
        $data = array
        (
            'product_in_cart' => $product_in_cart,
            'product' => $product
        );
        return view('productscarts.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $product_in_cart = ProductsCart::find($id);
        $product_in_cart->delete();
        
        return redirect('/carts/'.auth()->user()->id)->with('success', 'Item removed from cart');
    }
}
