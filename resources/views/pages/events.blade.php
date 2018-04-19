@extends('layouts.app')
@section('content')
        <div class="row">
            @if(count($events) > 0)
                <h1 align="center">{{$title}} Events</h1>
                @foreach($events as $event)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ url('events',[$event->id]) }}" style="color: black;">
                                    <img class="card-img-top" src="/storage/cover_images/{{$event->cover_image}}">
                                    <div class="card-block">
                                         <h4 class="card-title mt-3">{{$event->event_name}}</h4>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <small>{{$event->location}} <i class="material-icons" style="font-size:15px; align-content: center ">&#xe55f;</i></small><br/>
                                    <small>Date: {{$event->date}}</small>
                                </div>
                            </div>
                        </div>
                @endforeach
                {{$events->links()}}
            @else
                <p>NO EVENTS FOUND...</p>
            @endif
        </div>
@endsection
