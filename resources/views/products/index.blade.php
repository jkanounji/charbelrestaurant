@extends('layouts.app')
@include('layouts.backgrounds')

@section('content')
    <div>
            <a href="/" class="button small">Back</a>
            <a href="/products/create" class="button small">Create Product</a>
    </div>
    <br><br>

    <h1 align="center">MadreTest's Products' Page</h1>
    <p align="center">We offer the selected products</p>

    <hr>

    <div>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <img style="width:100%" src="/storage/product_images/{{$product->photo}}">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <h4 style="font-weight:bold"><a href="/products/{{$product->id}}">{{$product->name}}</a></h4>
                        <p>Price: {{$product->display_price}} L.L.</p>
                        <p>Description: {{$product->description}}</p>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <a href="/productscarts/{{$product->id}}" class="button small">Add to cart</a> 
                    </div>
                </div>
            </div>
            <br><br>
        @endforeach
    @else
            <div class="well">
                <h3>No products found</h3>
            </div>
    @endif
    </div>

@endsection