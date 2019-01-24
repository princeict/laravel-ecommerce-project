@extends('frontEnd.master')
@section('title')
Shipping
@endsection
@section('mainContent')
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">Coming soon</div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
                <div class="input-info">
                    <h1 class="text-center">Shipping Form</h1>
                    <hr/>
                </div>
                <div class="form-body form-body-info">
                    {!!Form::open(['url'=>'/checkout/save-shipping','method'=>'POST'])!!}
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" name="fullName" placeholder="Full Name" value="{{$customerById->fullName}}" required="">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="emailAddress" placeholder="Email" data-error="That email address is invalid" value="{{$customerById->emailAddress}}" required="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="districtName">
                            <option selected>District</option>
                            <option value="1">Dhaka</option>
                            <option value="2">Comilla</option>
                            <option value="3">Chittagong</option>
                            <option value="1">Barisal</option>
                            <option value="2">Sylhet</option>
                            <option value="3">Faridpur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="inputName" name="address" placeholder="Address" required="">{{$customerById->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName" name="phoneNumber" placeholder="Phone Number" value="{{$customerById->phoneNumber}}" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Save Shipping Info</button>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<script type="text/javascript">
    document.forms['shipping-form'].elements['districtName'].value = {{$customerById->districtName}}
</script>
@endsection


