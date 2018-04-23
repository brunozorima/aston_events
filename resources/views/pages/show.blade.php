@extends('layouts.app')
@section('content')
    <div class="container_info">
        <div class="cards">
            <article class="card card_main">
                <header class="card__header">
                    @if(count($images) > 1)
                        @foreach($images as $image)
                            <img class="card__preview mySlides w3-animate-fading" src="/storage/cover_images/{{$image->image_name}} "style="width: 100%">
                        @endforeach
                    @else
                        <img class="card__preview mySlides" src="/storage/cover_images/{{$event->cover_image}} "style="width: 100%">
                    @endif
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3>{{$event->event_name}}</h3>
                        <div class="card__description">
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                    <footer class="card__footer">
                        <span class="card__author"><strong>Created By</strong> {{$event->organiser}}</span>
                        <span class="card__author"><strong>Posted on</strong> {{$event->created_at}}</span>
                        <div class="card__meta">
                            <div class="card__meta-item">
                                @if(Auth::guest())
                                <form method="POST" action="{{action('PagesController@like_event', $event->id)}}" role="form">
                                    {{csrf_field()}}
                                    <button class="btn btn-default"><i onclick="myFunction(this)" class="fa fa-thumbs-up" ></i></button> <span class="card__label">{{$event->event_likes}} Likes</span>
                                </form>
                                @else
                                    <span class="card__label"><strong>{{$event->event_likes}}</strong> Likes</span>
                                @endif
                                <script>
                                    function myFunction(x) {
                                        x.classList.toggle("fa-thumbs-down");
                                    }
                                </script>
                            </div>
                            <div class="card__meta-item">
                                <i class="card__meta-icon card__meta-likes"></i>
                                <span class="card__label"><strong>Category:</strong> {{$event->category}}</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </article>
            <article class="card card_size-m">
                <header class="card__header align-content-center">
                    <h3 class="card__title"><i>DATE AND TIME INFORMATION</i></h3>
                    <h4><i>Event Date: </i> {{$event->date}}</h4>
                    <h4><i>Starts At:</i> {{$event->start_at}} </h4>
                    <h4><i>Ends At: </i> {{$event->end_at}} BST</h4>
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3 class="card__title"><i>LOCATION INFORMATION</i></h3>
                        <div class="card__description">
                            <h4><i>{{$event->location}}</i></h4>
                            <h4><i>{{$event->postcode}}</i></h4>
                            <h4><i>{{$event->county}}</i></h4>
                        </div>
                    </div>
                </div>
                <div class="card__body">
                    <div class="card__content">
                        <h3 class="card__title"><i>EVENT INFORMATION</i></h3>
                        <div class="card__description">
                            <h4><i>Call us on: {{$event->contact}}</i></h4>
                            <h4><i>Last Updated on: {{$event->updated_at}}</i></h4>
                        </div>
                    </div>
                </div>
                <footer class="card__footer">
                    <a href="/events" class="btn btn-primary">RETURN</a>
                    @if(Auth::guest())
                        <a href="mailto:{{$user_email}}?Subject=Enquiry Title: {{$event->event_name}}&body=Dear, {{$event->organiser}}" class="btn btn-default">Contact Event Organiser</a>
                    @endif
                    @if(!Auth::guest())
                        @if(Auth::user()->id !== $event->user_id)
                            <a href="mailto:{{$user_email}}?Subject=Enquiry Title: {{$event->event_name}} &body=Dear, {{$event->organiser}}" class="btn btn-default">Contact Event Organiser</a>
                        @endif
                    @endif
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
                </footer>
            </article>
        </div>
    </div>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 10000);
        }
    </script>
@endsection

