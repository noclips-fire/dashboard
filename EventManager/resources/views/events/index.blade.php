@extends('events.layout.default')


@section('header')
    <div class="mt-24 mx-50 flex py-5 shadow-lg bg-header rounded-2xl font-mono">
        <div class="flex-col">
            <div class="flex items-center w-full pl-13 mb-5">  
                <h1 class="events">Events</h1> 
            </div>
            
            <div class="w-full flex items-start space-y-4 flex-row">
                <div class="relative flex pl-10">
                    <form action="{{ route('event.create') }}" method="GET" class="text-center">
                        <button type="submit" class="createB">
                            Create an Event
                        </button>
                    </form>
                </div>
    
                <div>
                    @if(session()->has('success'))
                        <div class="ml-4 py-2 px-4 rounded-md w-full">
                            <span class="successText">
                                {{ session('success') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('main')
    <div class="flex justify-center items-center bg-main mt-5 mb-24 mx-50 px-5 pb-8 pt-4 rounded-lg">
        <div class=" w-full rounded-lg ">
            @php
                $sortedEvents = $events->sortBy('event_time');
            @endphp
            @foreach($sortedEvents as $event)
            <div class="eventsTable bg-opacity-40">
                @php
                    $eventTime = \Carbon\Carbon::parse($event->event_time);
                    $month = $eventTime->month;

                    $gradient = '';
                    $season = '';

                    if ($month >= 3 && $month <= 5) {
                        $gradient = 'spring'; 
                        $season = 'Spring';
                    } elseif ($month >= 6 && $month <= 8) {
                        $gradient = 'summer';
                        $season = 'Summer';
                    } elseif ($month >= 9 && $month <= 11) {
                        $gradient = 'autumn';
                        $season = 'Autumn';
                    } else {
                        $gradient = 'winter';
                        $season = 'Winter';
                    }
                @endphp

                <div class="w-3/12 {{ $gradient }} py-5 rounded-lg shadow-md flex flex-col justify-between">
                    <div class="text-center text-xl font-bold text-white">
                        <div>{{ $eventTime->year }}</div>
                        <div>{{ $eventTime->format('l') }}, {{ $eventTime->day }}</div>
                        <div>{{ $eventTime->format('H:i') }}</div>
                        <div class="mt-2 text-sm text-gray-200">{{ $season }}</div>
                    </div>
                </div>

                @php
                    $descr = $event->description;
                    $shadow  = '';

                    if($descr != null){
                        $shadow = 'shadow-lg';
                    }
                @endphp

                <div class="w-7/12 px-4 space-y-3 flex flex-col justify-between">
                    <div class=" font-mono text-left pb-2 ">{{ $event->name }}</div>
                    <div class=" font-sans text-left p-4 {{ $shadow }}">{{ $event->description }}</div>
                </div>

                <div class="w-2/12 flex flex-col space-y-2">
                    <div>
                        <button onclick="window.location='{{ route('event.edit', ['event' => $event]) }}'" 
                                class="editB">
                            Edit
                        </button>
                    </div>
                    <div>
                        <form method="post" action="{{ route('event.destroy', ['event' => $event]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" 
                                    class="deleteB">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection

