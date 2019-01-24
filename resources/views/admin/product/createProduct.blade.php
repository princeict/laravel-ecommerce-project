
@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <h3 class='text-center'>{{Session::get('message')}}</h3>
        <div class="well">
            {!!Form::open(['url'=>'/product/save','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
            <!--                {{ csrf_field() }}-->
            <!--                {!!Form::open(['url'=>'product/save','method'=>'POST']) !!}-->
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="productName">
                    <span class="text-danger">{{ $errors->has('productName')?$errors->first('productName'):''}}</span>        
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Categoty Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoryId">
                        <option>Select Categoty Name</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="manufacturerId">
                        <option>Select Manufacturer Name</option>
                        @foreach($manufacturers as $item)
                        <option value="{{$item->id}}">{{$item->manufacturerName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="productPrice">
                    <span class="text-danger">{{ $errors->has('productPrice')?$errors->first('productPrice'):''}}</span>        
                </div>
            </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="productQuantity">
                    <span class="text-danger">{{ $errors->has('productQuantity ')?$errors->first('productQuantity '):''}}</span>        
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Product Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="productShortDescription"></textarea>
                    <span class="text-danger">{{ $errors->has('productShortDescription')?$errors->first('productShortDescription  '):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="productLongDescription" id="editor"></textarea>
                    <span class="text-danger">{{ $errors->has('productLongDescription')?$errors->first('productLongDescription '):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="productImage" accept="image/">
                    <span class="text-danger">{{ $errors->has('productImage')?$errors->first('productImage'):''}}</span>        
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Product Status</label>
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