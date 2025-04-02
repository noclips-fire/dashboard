<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Event</h1>
    <a href='{{ route("event.create") }}'>Create an Event</a>
    
    <div>
    <table border="3">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Description</th>
            <th>Edit</th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td> {{ $event->name }} </td>
                <td> {{ $event->event_time }} </td>
                <td> {{ $event->description }} </td>
                <td>
                    <a href="{{ route('event.edit', ['event' => $event]) }}">Edit an Event</a>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</body>
</html>