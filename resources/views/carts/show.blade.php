@extends('layouts.app')

@section('content')
    <a href="/" class="button small">Back</a>
    <br><br>

        @if(count($products_in_cart) > 0)
            @foreach($products_in_cart as $product_in_cart)
                <div class="row">
                   <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <img style="width:100%" src="/storage/product_images/{{$product_in_cart->product_photo}}">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <h3 style="font-size:135%"><b><a href="/productscarts/{{$product_in_cart->id}}/edit">{{$product_in_cart->product_name}}</a></b></h3>
                        <p style="font-size:85%"><b>Quantity:</b> {{$product_in_cart->quantity}}
                        <br><b>Unit Price:</b> {{$product_in_cart->product_display_price}} L.L.</p>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        {!!Form::open(['action' => ['ProductsCartsController@destroy', $product_in_cart->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('X', ['class' => 'button small'])}}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                </div>
                <br><br>
            @endforeach
            <div class="row">
                <div class="col-xs-9 col-sm-9 col-md-9">
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <h3 align="right">Total: {{$total}} L.L. </h3>
                    {!!Form::open(['action' => ['CartsController@destroy', $id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Check Out', ['class' => 'button'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        @else 
            <h3>Your cart is empty!</h3>
        @endif

@endsection