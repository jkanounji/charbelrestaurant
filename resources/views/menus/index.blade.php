@extends('layouts.app')
@include('layouts.backgrounds')

@section('content')
    <div>
        <a href="/" class="btn btn-default">Back</a>
    </div>

    <div class="bgimg1">
        <h1 align="center" style="color:white">MadreTest's Menu Page</h1>
        <p align="center" style="color:whitesmoke">We offer the selected items on our menu</p>
    </div>

    @if(count($menus) == 0)
        <h2 align="center"> There are currently no active menus or events</h2>
    @else
        @foreach($menus as $menu)
            <div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        PDF THUMBNAIL GOES HERE
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        Download Menu
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
            </div>
            <br><br>
        @endforeach

    @endif



@endsection