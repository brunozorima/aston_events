@extends('layouts.app')
@section('content')
    <h1>{{$event->event_name}}</h1>
    <h2>{{$event->category}}</h2>
    <h3>{{$event->organiser}}</h3>
    <h4>{{$event->date}}</h4>
    <h5>{{$event->location}}</h5>
    <a href="/events" class="btn btn-primary">Go Back</a>
    <hr>
    {{csrf_field()}}
    @if(!Auth::guest())
        @if(Auth::user()->id == $event->user_id)

            <a href="/event/{{$event->id}}/edit" class="btn btn-default">Edit Event</a>
            <form method="POST" action="{{action('EventsController@destroy', $event->id)}}" class="pull-right">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type="submit" class="btn btn-danger">Remove Event</button>
            </form>


        @endif
    @endif
@endsection

