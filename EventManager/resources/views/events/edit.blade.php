<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <form method="post" action="{{ route('event.save') }}">
        @csrf
        @method('post')
        <div>
        <label>Name: </label>
        <input type="text" name="name" placeholder="Name" value="{{$event->name}}" />
        </div>
        <div>
        <label>Description: </label>
        <input type="text" name="description" placeholder="Description" value="{{$event->description}}"/>
        </div>
        <div>
        <label>Date: </label>
        <input type="datetime-local" name="event_time" placeholder="Date" value="{{$event->event_time}}"/>
        </div>
        <input type="submit" value="Save an Event"/>
    </form>
</body>
</html>