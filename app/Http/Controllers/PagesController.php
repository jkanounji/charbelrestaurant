<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        $title = 'Welcome to MadreTest';
        return view('welcome')->with('title', $title);
    }
}
