@extends('layouts.app')

@section('content')
    <a href="/events" class="button small">Back</a>
    <div class="jumbotron text-center">
        <h1>Reservation</h1>
    </div>

    {!! Form::open(['action' => ['ReservationsController@update', $reservation->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('seats', 'Number of seats')}}
            {{Form::selectRange('seats', 1, $event->seats, $reservation->seats)}}
        </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'button small'])}}
    {!! Form::close() !!}
@endsection