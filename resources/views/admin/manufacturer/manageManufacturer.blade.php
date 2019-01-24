
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
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($manufacturers as $manufacturer)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$manufacturer->manufacturerName}}</td>
                                <td>{{$manufacturer->manufacturerDescription}}</td>
                                <td>{{$manufacturer->publicationStatus==1?'published':'unpublished'}}</td>
                                <td>
                                    <a href="{{url('/manufacturer/edit/'.$manufacturer->id)}}" class='btn btn-success'>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/manufacturer/delete/'.$manufacturer->id)}}" class='btn btn-danger' onclick="return confirm('Are you sure want to delete?')">
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