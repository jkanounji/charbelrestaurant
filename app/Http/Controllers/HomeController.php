<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        if (count($cart) == 0)
        {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->save();
        }
        return redirect('/')->with('success', 'Welcome back!');
    }
}
