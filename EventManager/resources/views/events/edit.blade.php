@extends('events.layout.default')


@section('header')
    <h1>Update an Event</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
@endsection


@section('main')
    <form method="post" action="{{ route('event.update', $event) }}">
        @csrf
        @method('put')
        <div>
            <label>Name: </label>
            <input type="text" name="name" placeholder="Name" value="{{old('name', $event->name ?? '')}}" required/>
        </div>
        <div>
            <label>Description: </label>
            <input type="text" name="description" placeholder="Description" value="{{$event->description}}"/>
        </div>
        <div>
            <label>Date: </label>
            <input type="datetime-local" name="event_time" placeholder="Date" value="{{$event->event_time}}" required/>
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
@endsection
