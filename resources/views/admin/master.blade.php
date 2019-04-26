<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('public/admin/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('public/admin/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('public/admin/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('public/admin/')}}/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('public/admin/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery -->
        <script src="{{asset('public/admin/')}}/vendor/jquery/jquery.min.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @include('admin.includes.header')
                <!-- /.navbar-top-links -->

                @include('admin.includes.leftMenu')
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                @yield('content')
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->



        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/admin/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('public/admin/')}}/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('public/admin/')}}/vendor/raphael/raphael.min.js"></script>
        <script src="{{asset('public/admin/')}}/vendor/morrisjs/morris.min.js"></script>
        <script src="{{asset('public/admin/')}}/data/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('public/admin/')}}/dist/js/sb-admin-2.js"></script>
    </body>

</html>
