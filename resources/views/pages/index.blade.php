@extends('layouts.app')
@section('content')
    <h1 align="center"><strong>Welcome To Aston Event</strong></h1>
    <section>
        <h3><strong><i>Popular Events...</i></strong></h3>
        <div class="row">
            @if(count($popularEvents) > 0)
                @foreach($popularEvents as $event)
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
                {{--{{$events->links()}}--}}
            @else
                <p>No Popular Events Found...</p>
            @endif
        </div>
    </section>
    <h3><strong><i>Upcoming Events...</i></strong></h3>
        <div class="row">
            @if(count($newestEvents) > 0)
                @foreach($newestEvents as $new_event)
                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ url('events',[$new_event->id]) }}" style="color: black">
                                <img class="card-img-top" src="/storage/cover_images/{{$new_event->cover_image}}">
                                <div class="card-block">
                                    <h4 class="card-title mt-3">{{$new_event->event_name}}</h4>
                                </div>
                            </a>
                            <div class="card-footer">
                                <small>{{$new_event->location}}</small><br/>
                                <small>Date: {{$new_event->date}}</small>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section>
        <h3><strong><i>Event Trending This Month...</i></strong></h3>
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
                {{--{{$events->links()}}--}}
            @else
                <p>No Events Found Month</p>
            @endif
        </div>
    </section>
@endsection

