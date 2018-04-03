@extends('layouts.app')
@section('content')
    <h1>My Events</h1>
    @if(count($events) > 0)
        @foreach($events as $event)
            <div class="well">
            <h3><a href="/event/{{$event->id}}">{{$event->event_name}}</a></h3>
            <h3>{{$event->category}}</h3>
            <h1>{{$event->event_name}}</h1>
            <small>Posted by {{$event->organiser}}</small>
            </div>
        @endforeach
        {{$events->links()}}
    @else
    <p>No Events Found</p>
    @endif
@endsection