<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Category Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/category/add')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{url('/category/manage')}}">Manage Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-amazon fa-fw"></i>Manufacturer Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/manufacturer/add')}}">Add Manufacturer</a>
                    </li>
                    <li>
                        <a href="{{url('/manufacturer/manage')}}">Manage Manufacturer</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-anchor fa-fw"></i>Product Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/product/add')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{url('/product/manage')}}">Manage Product</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{url('/order/manage')}}"><i class="fa fa-adjust fa-fw"></i>Manage Order</a>
            </li>
<!--            <li>
                <a href="#"><i class="fa fa-user-plus fa-fw"></i>User Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/user/add')}}">Add User</a>
                    </li>
                    <li>
                        <a href="{{url('/user/manage')}}">Manage User</a>
                    </li>
                </ul>
                 /.nav-second-level 
            </li>-->
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>