@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Welcome {{ Auth::user()->name }}</h1></div>
                    <div class="panel-body">
                        <h1>My Events</h1>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($events) > 0)
                            @foreach($events as $event)
                                <h1>{{$event->event_name}}</h1>
                                <hr>
                                <a href="/event/{{$event->id}}" class="btn btn-default">View</a>
                                <a href="/event/{{$event->id}}/edit" class="btn btn-default">Edit Event</a>
                                <form method="POST" action="{{action('EventsController@destroy', $event->id)}}" class="pull-right">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="btn btn-danger">Remove Event</button>
                                </form>
                            @endforeach
                        @else
                            <p>No Events Found <a href="{{ url('/event/create') }}">Create One?</a> </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection