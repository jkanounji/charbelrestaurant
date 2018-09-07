@extends('layouts.app')

@section('content')
    <div>
            <a href="/" class="button small">Back</a>
            <a href="/events/create" class="button small">Create Event</a>
    </div>
    <br><br>

        <div class="jumbotron text-center">
            <h1 align="center">MadreTest's Events' Page</h1>

        </div>

    <hr>

    <div>
    @if(count($events) > 0)
        @foreach($events as $event)
            <div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                    <p> <a href="/events/{{$event->id}}">{{$event->name}} </a></p>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                    </div>
                </div>
            </div>
            <br><br>
        @endforeach
    @else
            <div class="well">
                <h3>No events found</h3>
            </div>
    @endif
    </div>

@endsection