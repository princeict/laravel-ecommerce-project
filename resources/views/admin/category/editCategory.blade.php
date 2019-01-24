
@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <h3 class='text-center'>{{Session::get('message')}}</h3>
        <div class="well">
            {!!Form::open(['url'=>'category/update','method'=>'POST','class'=>'form-horizontal','name'=>'editForm'])!!}
            <!--                {{ csrf_field() }}-->
            <!--                {!!Form::open(['url'=>'category/save','method'=>'POST']) !!}-->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="categoryName" value="{{$categoryById->categoryName}}">
                    <input type="hidden" class="form-control"  name="id" value="{{$categoryById->id}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="categoryDescription">{{$categoryById->categoryDescription}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="publicationStatus">
                        <option>Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">UnPublished</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 pull-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script type="text/javascript">
    document.forms['editForm'].elements['publicationStatus'].value={{$categoryById->publicationStatus}}
</script>
@endsection