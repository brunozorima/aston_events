@extends('layouts.app')
@section('content')
    <h1>All Available Events</h1>
    {{--<a href="events.blade.php" class="btn btn-primary">Click me</a>--}}

    <div align="center" class ="benefits">
        <div class ="benefit1" >
            <h1>Why Join PressGym?</h1>
            <a href = "#"><img class ="img" src="/storage/cover_images/android 3D LOGO_1522640326.png"/></a>
            <p>
                some text here
            </p>
        </div>

        <div class ="benefit1" >
            <h1> Student - Get up to 20% OFF </h1>
            <a href = "#"><img class ="img" src="/storage/cover_images/android 3D LOGO_1522640326.png"/></a>
            <p>
                some text here
            </p>
        </div>

        <div class ="benefit1" >
            <h1>50+ Classes Available</h1>
            <a href = "#"><img class ="img" src="/storage/cover_images/android 3D LOGO_1522640326.png"/></a>
            <p>
                some text here
            </p>
        </div>

        <div class ="benefit1" >
            <h1>No Joining Fee OR Contract</h1>
            <a href = "#"><img class ="img" src="/storage/cover_images/android 3D LOGO_1522640326.png"/></a>
            <p>
                some text here
            </p>
        </div>

    </div>




























            {{--<div class="well">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<img style="width: 100%" src="/storage/cover_images/{{$event->cover_image}}">--}}
                    {{--</div>--}}
                    {{--<div class="col-md-8 col-sm-8">--}}
                        {{--<h1>{{$event->event_name}}</h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="{{ url('events',[$event->id]) }}" class="btn btn-default">View</a>--}}
            {{--</div>--}}
            <hr>
        {{--@endforeach--}}
        {{--{{$events->links()}}--}}
    {{--@else--}}
        {{--<p>No Events Found</p>--}}
    {{--@endif--}}
@endsection