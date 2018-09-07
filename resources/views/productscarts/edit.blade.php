@extends('layouts.app')

@section('content')
    <a href="/products/{{$product_in_cart->product_id}}" class="btn btn-default">Back</a>
    <div class="jumbotron text-center">
        <h1>{{$product_in_cart->product_name}}</h1>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                  <img style="width:100%" src="/storage/product_images/{{$product_in_cart->product_photo}}">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <h4>Price: <small>{{$product_in_cart->product_display_price}} L.L.</small></h4>
                <h4>Description: <small>{{$product_in_cart->product_description}}</small></h4>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group" id="form1">
                    {!! Form::open(['action' => 'ProductsCartsController@store', 'method' => 'POST']) !!}
                    {{Form::label('quantity', 'Quantity')}}
                    {{Form::text('quantity', $product_in_cart->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                    {{Form::hidden('product_id', $product_in_cart->product_id)}}
                    {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
                @if ($product_in_cart->quantity > 0)
                    <div class="form-group" id="form2">
                        {!!Form::open(['action' => ['ProductsCartsController@destroy', $product_in_cart->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Remove', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection