<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Event;

class ReservationsController extends Controller
{
    public function index()
    {
        if(auth()->user()->id == 1)
        {
            $reservations = Reservation::all();
        }
        else
        {
            $reservations = Reservation::where('user_id', auth()->user()->id);
        }

        return view('reservations.index')->with('reservations', $reservations);
    }

    public function show($id)
    {
       $reservation = Reservation::find($id);
       
       return view('reservations.show')->with('reservation', $reservation);
    }

    public function edit($event_id)
    {
        $reservation = Reservation::where('event_id', $event_id)->first();
        if(count($reservation) == 0)
        {
            $reservation = new Reservation;
            $reservation->event_id = $event_id;
            $reservation->user_id = auth()->user()->id;
            $reservation->seats = 1;
        }
        $event = Event::find($event_id);
        $data = array (
            'reservation' => $reservation,
            'event' => $event
        );

        return view('reservations.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        if(count($reservation) == 0)
        {
            $reservation = new Reservation;
            $reservation->event_id = $request->input('event_id');
            $reservation->user_id = auth()->user()->id;
        }
        $reservation->seats = (int)$request->input('seats');
        $reservation->save();

        $event = Event::find($reservation->event_id);
        $event->seats -= $reservation->seats;
        $event->save();

        return redirect('/events/'.$reservation->event_id)->with('success', 'Reservation Updated');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $seats = $reservation->seats;
        $event_id = $reservation->event_id;
        $reservation->delete();

        $event = Event::find($event_id);
        $event->seats += $seats;
        $event->save();

        return redirect('/events/'.$event_id)->with('success', 'Reservation Deleted');
    }
}
