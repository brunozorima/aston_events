@extends('layouts.app')
@section('content')
    <div class="container_info">
        <div class="cards">
            <article class="card card_main">
                <header class="card__header">
                    <img class="card__preview" src="/storage/cover_images/{{$event->cover_image}}" alt="Preview img">
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3>{{$event->event_name}}</h3> <!--class="card__title"-->
                        <div class="card__description">
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                    <footer class="card__footer">
                        <span class="card__author">By {{$event->organiser}}</span>
                        <div class="card__meta">
                            <div class="card__meta-item">
                                <i class="card__meta-icon card__meta-comments"></i>
                                <span class="card__label">47 Likes</span>
                            </div>
                            <div class="card__meta-item">
                                <i class="card__meta-icon card__meta-likes"></i>
                                <span class="card__label">{{$event->category}}</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </article>
            <article class="card card_size-m">
                <header class="card__header align-content-center">
                    <h3 class="card__title label label-default">Date and Time</h3>
                    <h4>{{$event->date}}</h4>
                    <h4>{{$event->start_at}} - {{$event->end_at}} BST</h4>
                </header>
                <div class="card__body">
                    <div class="card__content">
                        <h3 class="card__title label label-default">Location</h3>
                        <div class="card__description">
                            <h5>{{$event->location}}</h5>
                            <p>Birmingham</p>
                            <p>B15 7LS</p>
                        </div>
                    </div>
                </div>
                <footer class="card__footer">
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
@endsection

