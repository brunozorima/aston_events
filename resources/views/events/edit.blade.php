@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Edit an event</div>
            </div>

            <div class="panel-body" >
                <form id="eventform" class="form-horizontal" method="POST" action="{{action('EventsController@update', $events->id)}}"  enctype="multipart/form-data" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="event_name" class="col-md-3 control-label">Event Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="event_name" value="{{$events->event_name}}" placeholder="Name of the event">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="category" class="col-md-3 control-label">Category</label>
                        <div class="col-md-9">
                            <select name="category" class="form-control" id="category">
                                <option value="{{$events->category}}" selected>{{$events->category}}</option>
                                <option value="Sport">Sport</option>
                                <option value="Culture">Culture</option>
                                <option value="Music">Music</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea rows="5" name="description"  cols="114" style="resize:none" placeholder="Enter a brief description">{{$events->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-md-3 control-label">Event Date</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" value="{{$events->date}}" name="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_at" class="col-md-3 control-label">Event Starts:</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" value="{{$events->start_at}}" name="start_at">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_at" class="col-md-3 control-label">Event Ends:</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" value="{{$events->end_at}}" name="end_at">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Contact Number</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact" value="{{$events->contact}}" placeholder="Contact Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-md-3 control-label">Event location</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="location" value="{{$events->location}}" placeholder="Location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postcode" class="col-md-3 control-label">Post Code</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="postcode" value="{{$events->postcode}}" placeholder="Post Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="County" class="col-md-3 control-label">County</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="county" value="{{$events->county}}" placeholder="County">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-md-3 control-label">Photos</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="cover_image[]" multiple="true" accept="image/*" >
                        </div>
                    </div>

                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i>Update Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection