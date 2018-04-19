@extends('layouts.app')
@section('content')
    <div class="container_info">
        <div class="cards">
            <article class="card card_main">
                <header class="card__header">
                    @if(count($images) > 0)
                        @foreach($images as $image)
                            <img class="card__preview mySlides w3-animate-fading" src="/storage/cover_images/{{$image->image_name}}">
                        @endforeach
                    @endif
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3>{{$events->event_name}}</h3> <!--class="card__title"-->
                        <div class="card__description">
                            <p>{{$events->description}}</p>
                        </div>
                    </div>
                    <footer class="card__footer">
                        <span class="card__author">By {{$events->organiser}}</span>
                        <div class="card__meta">
                            <div class="card__meta-item">
                                <i class="card__meta-icon card__meta-comments"></i>
                                <span class="card__label">47 Likes</span>
                            </div>
                            <div class="card__meta-item">
                                <i class="card__meta-icon card__meta-likes"></i>
                                <span class="card__label">{{$events->category}}</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </article>
            <article class="card card_size-m">
                <header class="card__header align-content-center">
                    <h3 class="card__title label label-default">Date and Time</h3>
                    <h4>{{$events->date}}</h4>
                    <h4>{{$events->start_at}} - {{$events->end_at}} BST</h4>
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3 class="card__title label label-default">Location</h3>
                        <div class="card__description">
                            <h5>{{$events->location}}</h5>
                            <p>Birmingham</p>
                            <p>B15 7LS</p>
                        </div>
                    </div>
                </div>
                <footer class="card__footer">
                    {{csrf_field()}}
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $events->user_id)
                            <a href="/event" class="btn btn-primary">RETURN</a>
                            <a href="/event/{{$events->id}}/edit" class="btn btn-default">Edit Event</a>
                            <form method="POST" action="{{action('EventsController@destroy', $events->id)}}" class="pull-right">
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