@extends('events.layout.default')


@section('header')
    <div class="mt-24 mx-50 flex py-5 shadow-lg bg-header rounded-2xl font-mono">
        <div class="flex-col">
            <div class="flex items-center w-full pl-13 mb-5">  
                <h1 class="events">Create an Event</h1> 
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

    <div class="flex justify-center items-center bg-main mt-5 mb-24 mx-50 px-5 pb-8 pt-4 rounded-lg">
        <div class=" w-full rounded-lg  space-y-5">
            <form method="post" action="{{ route('event.save') }}">
                @csrf
                @method('post')
                <div class="grid grid-cols-6 gap-4">
                    <div class="bg-amber-300 ">
                        <label>Name: </label>
                    </div>

                    <div class="bg-amber-700 col-span-5">
                        <input type="text" name="name" placeholder="Name" class="input" required/>
                    </div>

                    <div class="bg-green-300">
                        <label>Description: </label>
                    </div>

                    <div class="bg-green-700 col-span-5">
                        <input type="text" name="description" placeholder="Description" />
                    </div>

                    <div class="bg-red-300">
                        <label>Date: </label>
                    </div>

                    <div class="bg-red-700 col-span-5">
                        <input type="datetime-local" name="event_time" placeholder="Date" required/>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit" class="w-full py-2 px-4 font-bold bg-gradient-to-r from-[#64f747] to-[#0abd9f] text-white rounded-lg hover:scale-105 hover:brightness-110 transition-transform duration-300 shadow-md">
                        Save an Event
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

    
