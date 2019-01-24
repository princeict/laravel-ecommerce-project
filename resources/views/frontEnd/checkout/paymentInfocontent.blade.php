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
                    {!!Form::open(['url'=>'/checkout/newOrder','method'=>'POST'])!!}
                    {{csrf_field()}}
                    <table class="table">
                        <tr>
                            <th>Cash on Delivery</th>
                            <td><input type="radio" name="paymentType" value="cash"></td>
                        </tr>
                        <tr>
                            <th>Paypal</th>
                            <td><input type="radio" name="paymentType" value="paypal"></td>
                        </tr>
                        <tr>
                            <th>Bkash</th>
                            <td><input type="radio" name="paymentType" value="bkash"></td>
                        </tr>
                        <tr>
                            <td class="col-span-2 text-center"><button type="submit" class="btn btn-info">Confirm Order</button></td>
                        </tr>
                    </table>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection


