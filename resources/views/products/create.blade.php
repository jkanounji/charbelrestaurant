@extends('layouts.app')

@section('content')
    <a href="/" class="button small">Back</a>
    <div class="jumbotron text-center">
        <h1>Create Product</h1>
    </div>

    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            {{Form::label('photo', 'Photo')}}
            {{Form::file('photo')}}
        </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection