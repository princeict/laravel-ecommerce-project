
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
                            <?php
                            $i = 1;
                            $index = 0;
                            ?>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->categoryName}}</td>
                                <td>{{$category->categoryDescription}}</td>
                                <td>{{$category->publicationStatus==1?'published':'unpublished'}}</td>
                                <td>
                                    <a href="{{url('/category/edit/'.$category->id)}}" class='btn btn-success'>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/category/delete/'.$category->id)}}" class='btn btn-danger' onclick="return confirm('Are you sure want to delete?')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    
                                     <a  class="btn btn-success" onclick="get_category_info('<?php echo $category->id; ?>','<?php echo $category->categoryName; ?>')" href="javascript:void(0)">Edit</a>                  
                                    <a  class="btn btn-success" onclick="get_category_info_data('<?php echo $index; ?>')" href="javascript:void(0)">Edit</a>                  
                                </td>
                            </tr>
                            <?php
                            $index++;
                            ?>
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
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Edit Category Information</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal" id="update_user_note" action="javascript:void(0);">
                        <input type="hidden" class="form-control" id="id">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required="">
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="">Update</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    localStorage.setItem('category_info', '<?php echo json_encode($categories) ?>');

    function get_category_info(index) {

        var category_info = JSON.parse(localStorage.getItem('category_info'));

        $('#noteModal').modal();

        jQuery('input[id=id]').val(category_info[index].id);
        jQuery('input[id=name]').val(category_info[index].categoryName);

        console.log(category_info[index]);

    }

    function get_category_info_data(id, name) {

        //var category_info = JSON.parse(localStorage.getItem('category_info'));

        $('#noteModal').modal();
        jQuery('input[id=id]').val(id);
        jQuery('input[id=name]').val(name);

    }
</script>

@endsection