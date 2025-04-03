@extends('events.layout.default')


@section('header')
    <h1>Create an Event</h1>
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
    <form method="post" action="{{ route('event.save') }}">
        @csrf
        @method('post')
        <div>
            <label>Name: </label>
            <input type="text" name="name" placeholder="Name" required/>
        </div>
        <div>
            <label>Description: </label>
            <input type="text" name="description" placeholder="Description" />
        </div>
        <div>
            <label>Date: </label>
            <input type="datetime-local" name="event_time" placeholder="Date" required/>
        </div>
        <div>
            <input type="submit" value="Save an Event"/>
        </div>
    </form>
@endsection


@section('footer')
    <p>End</p>
@endsection

    
