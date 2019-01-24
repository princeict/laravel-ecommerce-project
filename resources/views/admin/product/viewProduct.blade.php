
@extends('admin.master')
@section('content')
<table class="table table-bordered table-hover">
    <tr>
        <th>Name</th> 
        <th>{{$productInfoById->productName}}</th> 
    </tr>
    <tr>
        <th>Category</th> 
        <th>{{$productInfoById->categoryName}}</th> 
    </tr>
    <tr>
        <th>Manufacturer</th> 
        <th>{{$productInfoById->manufacturerName}}</th> 
    </tr>
    <tr>
        <th>Price</th> 
        <th>{{$productInfoById->productPrice}}</th> 
    </tr>
    <tr>
        <th>Quantity</th> 
        <th>{{$productInfoById->productQuantity}}</th> 
    </tr>
    <tr>
        <th>Short Description</th> 
        <th>{{$productInfoById->productShortDescription}}</th> 
    </tr>
    <tr>
        <th>Long Description</th> 
        <th>{{$productInfoById->productLongDescription}}</th> 
    </tr>
    <tr>
        <th>Image</th> 
        <th><img src="{{asset($productInfoById->productImage)}}"></th> 
    </tr>
    <tr>
        <th>Publication Status</th> 
        <th>{{$productInfoById->publicationStatus==1?'published':'unpublished'}}</th> 
    </tr>
</table>

@endsection