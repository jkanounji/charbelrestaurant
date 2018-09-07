@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Back</a>
    <div class="jumbotron text-center">
        <h1>Edit Product</h1>
    </div>

    {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            {{Form::label('photo', 'Photo')}}
            {{Form::file('photo')}}
        </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection