@extends('layouts.app')

@section('content')
    <a href="/products/{{$product->id}}" class="btn btn-default">Back</a>
    <div class="jumbotron text-center">
        <h1>{{$product->name}}</h1>
    </div>
    <div class="well">
        <h4>Price: <small>{{$product->product_display_price}}</small></h4>
        <h4>Description: <small>{{$product->description}}</small></h4>
    </div>

    <hr>

    {!! Form::open(['action' => 'ProductsCartsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('quantity', 'Quantity')}}
            {{Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
            {{Form::hidden('product_id', $product->id)}}
        </div>
    {{Form::submit('Add to cart', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <a href="/products/{{$product->id}}" class="btn btn-default">Cancel</a>

    <hr>

@endsection