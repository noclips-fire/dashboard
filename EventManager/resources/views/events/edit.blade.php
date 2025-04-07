@extends('events.layout.default')


@section('header')
    <div class="mt-24 mx-50 flex py-5 shadow-lg bg-header rounded-2xl font-mono">
        <div class="flex-col">
            <div class="flex items-center w-full pl-13 mb-5">  
                <h1 class="events">Update an Event</h1> 
            </div>
            
            <div class="w-full flex items-start space-y-4 flex-row">
            <div class="relative flex pl-10">
                    <form action="{{ route('event.index') }}" method="GET" class="text-center">
                        <button type="submit" class="createB">
                            Go back
                        </button>
                    </form>
                </div>
                <div>                    
                    @if($errors->any())
                        <div class="ml-4 py-2 px-4 rounded-md w-full">
                            @foreach($errors->all() as $error)
                                <span class="successText">
                                    {{$error}}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('main')
    <div class="flex justify-center items-center bg-main mt-10 mb-24 mx-50 px-6 py-10 rounded-lg">
        <div class="w-full rounded-lg space-y-8">
            <form method="post" action="{{ route('event.update', $event) }}" class="space-y-6">
                @csrf
                @method('put')

                <div class="grid grid-cols-6 gap-4 items-center">
                    <label class="col-span-1 text-right font-semibold text-white">Name:</label>
                    <input type="text" 
                        name="name" 
                        placeholder="Name" 
                        class="input col-span-5"
                        value="{{ old('name', $event->name ?? '') }}" 
                        required/>

                    <label class="col-span-1 text-right font-semibold text-white">Description:</label>
                    <input type="text" 
                        name="description" 
                        placeholder="Description" 
                        class="input col-span-5"
                        value="{{ $event->description }}"/>

                    <label class="col-span-1 text-right font-semibold text-white">Date:</label>
                    <input type="datetime-local" 
                        name="event_time" 
                        placeholder="Date" 
                        class="input col-span-5"
                        value="{{ $event->event_time }}" 
                        required/>
                </div>

                <div class="flex justify-end pt-6">
                    <button type="submit" class="saveB">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
