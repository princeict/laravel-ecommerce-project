<div class="header">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
            <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
            <li><span aria-hidden="true"></span><?php
                $customerId = Session::get('customerId');
                if ($customerId == null) {
                    ?>
                    <a class='btn btn-success pull-right' href='{{url('/checkout')}}'>Login</a>
                    <?php
                } else {
                    ?>
                    <a class='btn btn-success pull-right' href='{{url('/checkout/customerLogout')}}'>Logout</a>
                    <?php
                }
                ?></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="container">
        <div class="col-md-3 header-left">
            <h1><a href="{{url('/')}}"><img src="{{asset('public/frontEnd/images/logo3.jpg')}}"></a></h1>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-3 header-right footer-bottom">
            <ul>
                <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>

                </li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="twi" href="#"></a></li>
                <li><a class="insta" href="#"></a></li>
                <li><a class="you" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

