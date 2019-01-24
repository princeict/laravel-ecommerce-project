@extends('frontEnd.master')
@section('title')
Cart
@endsection
@section('mainContent')
<div class="page-head">
    <div class="container">
        <h3>Check Out</h3>
    </div>
</div>
<div class="checkout">
    <div class="container">
        <?php
//        $contents = Cart::content();
//        echo '<pre>';
//        print_r($contents);
        ?>
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <?php
                //$contents = Cart::content();
                ?>
                @foreach($contents as $item)
                <tr class="rem1">
                    <td class="invert-closeb">
                        {!!Form::open(['url'=>'/deleteCart','method'=>'POST'])!!}
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <input type="submit" class="glyphicon glyphicon-trash" name="btn" value="Remove">
                        {!!Form::close()!!}
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="{{$item->options['image']}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        {!!Form::open(['url'=>'/updateCart','method'=>'POST'])!!}
                        <input type="text" name="qty" value="{{$item->qty}}">
                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                        <input type="submit" name="btn" value="Update">
                        {!!Form::close()!!}

                    </td>
                    <td class="invert">{{$item->name}}</td>
                    <td class="invert">BDT {{$item->price}}</td>
                    <td class="invert">BDT {{$item->price*$item->qty}}</td>
                </tr>
                @endforeach


                <!--quantity-->
                <script>
                    $('.value-plus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
                        if (newVal >= 1)
                            divUpd.text(newVal);
                    });
                </script>
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
<!--                    <li>Hand Bag <i>-</i> <span>$45.99</span></li>
                    <li>Watches <i>-</i> <span>$45.99</span></li>
                    <li>Sandals <i>-</i> <span>$45.99</span></li>
                    <li>Wedges <i>-</i> <span>$45.99</span></li>-->
                    <li>Cart Sub Total <i>-</i> <span>BDT {{Cart::subtotal()}}</span></li>
                    <li>Tax (4.5%)<i>-</i> <span><?php
                            $subTotal = Cart::subtotal();
                            $subTotal = str_replace(',', '', $subTotal);
                            $$subTotal = str_replace('.00', '', $subTotal);
                            $tax = (4.5 * $subTotal) / 100;
                            echo 'BDT ' . $tax;
                            ?></span>
                    </li>
                    <li>Shipping Cost <i>-</i> <span><?php
                            $shippingCost = 50;
                            echo 'BDT ' . $shippingCost;
                            ?></span></li>
                    <li>Total <i>-</i> <span><?php
                            $total = $subTotal + $tax + $shippingCost;
                            echo $total;
                            ?></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <hr/>
        <?php
        $customerId = Session::get('customerId');
        $shippingId = Session::get('shippingId');

        Session::put('orderTotal', $total);
        
        if ($customerId != null && $shippingId != null) {
            ?>
            <a class='btn btn-primary pull-right' href='{{url('/checkout/paymentInfo')}}'>Checkout</a>
            <?php
        } else if ($customerId != null && $shippingId == null) {
            ?>
            <a class='btn btn-primary pull-right' href='{{url('/checkout/shipping')}}'>Checkout</a>
            <?php
        } else {
            ?>
            <a class='btn btn-primary pull-right' href='{{url('/checkout')}}'>Checkout</a>
            <?php
        }
        ?>
    </div>
</div>	
@endsection


