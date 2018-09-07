<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\Reservation;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events.index')->with('events', $events);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'event_date' => 'required|date|after:today',
            'seats' => 'required|integer',
            'description' => 'required',
            'menufile' => 'mimes:pdf|required|max:1999'
        ]);

        $filename_with_ext = $request->file('menufile')->getClientOriginalName();
        $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);
        $extension = $request->file('menufile')->getClientOriginalExtension();
        $filename_to_store = $filename.'_'.time().'.'.$extension;
        $path = $request->file('menufile')->storeAs('public/menu_files', $filename_to_store);

        $event = new Event;
        $event->name = $request->input('name');
        $event->event_date = $request->input('event_date');
        $event->seats = $request->input('seats');
        $event->description = $request->input('description');
        $event->menufile = $filename_to_store;
        $event->save();

        return redirect('/events')->with('success', 'Event Created');

    }

    public function show($id)
    {
        $event = Event::find($id);
        
        return view('events.show')->with('event', $event);
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit')->with('event', $event);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'event_date' => 'required|date|after:today',
            'seats' => 'required|integer',
            'menufile' => 'mimes:pdf|max:1999'
        ]);

        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->event_date = $request->input('event_date');
        $event->seats = $request->input('seats');

        if ($request->hasFile('menufile'))
        {
            $filename_with_ext = $request->file('menufile')->getClientOriginalName();
            $filename = pathinfo($filename_with_ext, PATHINFO_FILENAME);
            $extension = $request->file('menufile')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$extension;
            $path = $request->file('menufile')->storeAs('public/menu_files', $filename_to_store);
            $event->menufile = $filename_to_store;

        }
        $event->save();
        
        return redirect('/events/'.$id);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        Storage::delete('public/menu_files/'.$event->menufile);
        $event->delete();

        $reservations = Reservation::where('event_id', $id)->get();
        foreach($reservations as $reservation)
        {
            $reservation->delete();
        }

        return redirect('/events')->with('success', 'Event Deleted');
    }
}
