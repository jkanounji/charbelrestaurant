@extends('layouts.app')

@section('content')
    <a href="/products" class="button small">Back</a>
    <div class="jumbotron text-center">
        <h1>{{$product->name}}</h1>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                  <img style="width:100%" src="/storage/product_images/{{$product->photo}}">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <h4>Price: <small>{{$product->display_price}} L.L.</small></h4>
                <h4>Description: <small>{{$product->description}}</small></h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="/productscarts/{{$product->id}}" class="btn btn-success">Add to cart</a> 
            </div>
        </div>
    </div>

    <hr>

   <div class="row"> 
       <div class="col-xs-1 col-sm-1 col-md-1">
       </div>
       <div class="col-xs-1 col-sm-1 col-md-1">
            <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
       </div>
       <div class="col-md-1 col-sm-1">
            {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
       </div>
   </div>

@endsection