@extends('layouts.app')

@section('content')
    <a href="/events" class="button small">Back</a>
    <div class="jumbotron text-center">
        <h1>{{$event->name}}</h1>
    </div>
    <div class="well">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <h4>Description: <small>{{$event->description}}</small></h4>
                <h4>Seats Remaining: <small>{{$event->seats}}</small></h4>
                <h4>Date: <small>{{$event->event_date}}</small></h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
            <a href="/storage/menu_files/{{$event->menufile}}" class="button small">Download Menu</a>
            <br><br>
            <a href="/reservations/{{$event->id}}/edit" class="button small">Make a reservation</a>
            </div>
        </div>
    </div>

    <hr>

   <div class="row"> 
       <div class="col-xs-1 col-sm-1 col-md-1">
       </div>
       <div class="col-xs-1 col-sm-1 col-md-1">
            <a href="/events/{{$event->id}}/edit" class="button small">Edit</a>
       </div>
       <div class="col-md-1 col-sm-1">
            {!!Form::open(['action' => ['EventsController@destroy', $event->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'button primary small'])}}
            {!!Form::close()!!}
       </div>
   </div>

@endsection