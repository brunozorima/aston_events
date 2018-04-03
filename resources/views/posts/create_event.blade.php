@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Promote an event</div>
            </div>

            <div class="panel-body" >
                <form id="eventform" class="form-horizontal" method="POST" action="{{url('event')}}" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="event_name" class="col-md-3 control-label">Event Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="event_name" placeholder="Name of the event">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Category</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="category" placeholder="Category">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea rows="5" name="description" cols="114" style="resize:none" placeholder="Enter a brief description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="organiser" class="col-md-3 control-label">Organiser</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="organiser" value="{{ Auth::user()->name }}" readonly="readonly">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="col-md-3 control-label">Event Date</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_at" class="col-md-3 control-label">Event Starts:</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" name="start_at">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start_at" class="col-md-3 control-label">Event Ends:</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" name="end_at">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-3 control-label">Contact Number</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-md-3 control-label">Event location</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="location" placeholder="Location">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i>Post event</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection