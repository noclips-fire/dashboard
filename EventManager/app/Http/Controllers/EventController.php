<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('events.index', ['events' => $events] );   
    }

    public function create(){
        return view('events.create');
    }

    public function save(Request $request){
        //dd($request);
        //dd($request->name);

        $data = $request->validate([
            'name' => 'required|min:1|max:40',
            'description' => 'nullable',
            'event_time' => 'required|date',
        ]);

        $newEvent = Event::create($data);

        return redirect(route('event.index'))->with('success', 'Event added successfully');
    }

    public function edit(Event $event){
        return view('events.edit', ['event' => $event]);
    }

    public function update(Event $event, Request $request){
        $data = $request->validate([
            'name' => 'required|min:1|max:40',
            'description' => 'nullable',
            'event_time' => 'required|date',
        ]);

        $event->update($data);

        return redirect(route('event.index'))->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event){
        $event->delete();

        return redirect(route('event.index'))->with('success', 'Event deleted successfully');
    }
}
