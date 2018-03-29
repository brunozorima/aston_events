@extends('layouts.master')
@section('content')


<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
        </div>
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form">

                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">First Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">Last Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-md-3 control-label">Username*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="username" placeholder="Create a username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email Address*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password*</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="Create Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Confirm Password*</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password_repeat" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-md-3 control-label">Phone Number*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                </div>


                <a id="btn-fblogin" href="/login" class="btn btn-primary">Already Have an Account ?</a>

                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="button" class="btn btn-info btn-block"><i class="icon-hand-right"></i>Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection