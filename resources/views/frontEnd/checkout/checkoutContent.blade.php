@extends('frontEnd.master')
@section('title')
Checkout
@endsection
@section('mainContent')
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">YOU HAVE TO LOGIN TO COMPLETE YOUR ORDER.IF YOU ARE NOT REGISTERED, PLEASE REGISTER FIRST.</div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-6">
            <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
                <div class="input-info">
                    <h1 class="text-center">Register Form</h1>
                    <hr/>
                </div>
                <div class="form-body form-body-info">
                    {!!Form::open(['url'=>'/checkout/sign-up','method'=>'POST'])!!}
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" name="fullName" placeholder="First Name" required="">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="emailAddress" placeholder="Email" data-error="That email address is invalid" required="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="districtName">
                            <option selected>District</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Comilla</option>
                            <option value="3">Chittagong</option>
                            <option value="4">Barisal</option>
                            <option value="5">Sylhet</option>
                            <option value="6">Faridpur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="inputName" name="address" placeholder="Address" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" name="phoneNumber" placeholder="Phone Number" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget-shadow login-form-shadow" data-example-id="basic-forms"> 
                <div class="input-info">
                    <h1 class="text-center">Ligin Form</h1>
                    <hr/>
                </div>
                <div class="form-body form-body-info">
                    {!!Form::open(['url'=>'/checkout/customerLogin','method'=>'POST'])!!}
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="emailAddress" placeholder="Enter Your Email" data-error="Bruh, that email address is invalid" required="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword1" name="password" placeholder="Password" required="">
                    </div>
                    <div class="bottom">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection


