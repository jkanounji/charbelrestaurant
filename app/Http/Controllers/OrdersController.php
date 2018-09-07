<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\OrderProduct;

class OrdersController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order_products = OrderProduct::where('order_id', $id)->get();
        $user = User::find($order->user_id);

        $data = array
        (
            'order' => $order,
            'order_products' => $order_products,
            'user' => $user
        );

        return view('orders.show')->with('order', $order);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        $order_products = OrderProduct::where('order_id', $id)->get();
        foreach($order_products as $order_product)
        {
            $order_product->delete();
        }

        return redirect('/orders')->with('success', 'Order Deleted');
    }
}
