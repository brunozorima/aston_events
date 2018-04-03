@extends('layouts.app')
@section('content')
    <h1>{{$events->event_name}}</h1>
    <h2>{{$events->category}}</h2>
    <h3>{{$events->organiser}}</h3>
    <h4>{{$events->date}}</h4>
    <h5>{{$events->location}}</h5>
    <a href="/event" class="btn btn-primary">Go Back</a>
    <hr>
    {{--<a href="/event/{{$events->id}}/edit" class="btn btn-default">Edit Event</a>--}}
    {{--<form method="POST" action="{{action('EventsController@destroy', $events->id)}}" class="pull-right">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="hidden" name="_method" value="DELETE"/>--}}
        {{--<button type="submit" class="btn btn-danger">Remove Event</button>--}}
    {{--</form>--}}
@endsection