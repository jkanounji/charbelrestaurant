@extends('layouts.app')

@section('content')
    <a href="/events" class="button small">Back</a>
    <div class="jumbotron text-center">
        <h1>Create Event</h1>
    </div>

    {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Event Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('seats', 'Number of Seats')}}
            {{Form::text('seats', '', ['class' => 'form-control', 'placeholder' => 'Seats'])}}
            {{Form::label('event_date', 'Event Date')}}
            {{Form::date('event_date', \Carbon\Carbon::now())}}
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            {{Form::label('menufile', 'Menu')}}
            {{Form::file('menufile')}}
        </div>
    {{Form::submit('Submit', ['class' => 'button small'])}}
    {!! Form::close() !!}
@endsection