
@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center text-success">
                {{Session::get('message')}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->full_name}}</td>
                                <td>{{$item->order_total }}</td>
                                <td>{{$item->order_status}}</td>
                                <td>{{$item->payment_type}}</td>
                                <td>{{$item->payment_status}}</td>
                                <td>
                                    <a href="{{url('/product/view/'.$item->id)}}" class='btn btn-info' title="Order View">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </a>
                                    <a href="{{url('/product/view/'.$item->id)}}" class='btn btn-info' title="Order Invoice">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </a>
                                    <a href="{{url('/product/edit/'.$item->id)}}" class='btn btn-success' title="Order Invoice Download">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/product/edit/'.$item->id)}}" class='btn btn-success' title="Order Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/product/delete/'.$item->id)}}" class='btn btn-danger' title="Order Delete" onclick="return confirm('Are you sure want to delete?')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div> 
</div>


@endsection