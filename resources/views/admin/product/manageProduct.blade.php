
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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->categoryName}}</td>
                                <td>{{$product->manufacturerName}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td>{{$product->productQuantity}}</td>
                                <td>{{$product->publicationStatus==1?'published':'unpublished'}}</td>
                                <td>
                                    <a href="{{url('/product/view/'.$product->id)}}" class='btn btn-info' title="Product View">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </a>
                                    <a href="{{url('/product/edit/'.$product->id)}}" class='btn btn-success' title="Product Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/product/delete/'.$product->id)}}" class='btn btn-danger' title="Product Delete" onclick="return confirm('Are you sure want to delete?')">
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