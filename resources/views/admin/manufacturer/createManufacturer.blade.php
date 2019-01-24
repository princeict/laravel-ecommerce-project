
@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <h3 class='text-center'>{{Session::get('message')}}</h3>
        <div class="well">
            {!!Form::open(['url'=>'/manufacturer/save','method'=>'POST','class'=>'form-horizontal'])!!}
            <!--                {{ csrf_field() }}-->
            <!--                {!!Form::open(['url'=>'category/save','method'=>'POST']) !!}-->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="manufacturerName">
                    <span class="text-danger">{{ $errors->has('manufacturerName')?$errors->first('manufacturerName'):''}}</span>        
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="manufacturerDescription"></textarea>
                    <span class="text-danger">{{ $errors->has('manufacturerDescription')?$errors->first('manufacturerDescription'):''}}</span>
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
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>

@endsection