@extends('layouts.app')
@section('content')
    <h1>Welcome To Aston Event</h1>

    <h3>This month trending events...</h3>
    <div class="row">
        @if(count($events) > 0)
            @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ url('events',[$event->id]) }}" style="color: black">
                            <img class="card-img-top" src="/storage/cover_images/{{$event->cover_image}}">
                            <div class="card-block">
                                <h4 class="card-title mt-3">{{$event->event_name}}</h4>
                            </div>
                        </a>
                        <div class="card-footer">
                            <small>{{$event->location}}</small><br/>
                            <small>Date: {{$event->date}}</small>

                        </div>
                    </div>
                </div>
            @endforeach
            {{$events->links()}}
        @else
            <p>No Events Found Month</p>
        @endif
    </div>
@endsection

