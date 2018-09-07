@extends('layouts.app')

@section('content')
    <div>
            <a href="/" class="button small">Back</a>
    </div>
    <br><br>

    <div class="jumbotron text-center">
        <h1 align="center">Charbel Restaurant Reservations</h1>
    </div>
    <hr>

    <div>
    @if(count($reservations) > 0)
        @foreach($reservations as $reservation)
            <div>
                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        {{$reservation->id}} - {{$reservation->event_id}}
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
                <h3>No reservations found</h3>
            </div>
    @endif
    </div>

@endsection