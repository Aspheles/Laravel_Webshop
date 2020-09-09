@extends('layouts.app')


@section('content')
<div class="container m-2">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="categories">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-category</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                    <ul class="list-group category_block list-group-flush">
                            @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$category->name}}" name='{{$category->name}}' >
                                        <a href="/categories/{{$category->id}}" class="custom-control-label" for="{{$category->name}}">{{$category->name}}</a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    
                    </ul>
                </div>
               
            </div>
            <div class="col">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-5">
                        <div class="card m-2">
                            <img class="card-img-top d-flex align-items-stretch" src="../images/{{$product->Image}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><a href="/products/{{$product->Product_ID}}" title="View Product">{{$product->ProductName}}</a></h4>
                                <p class="card-text">{{$product->Description}}</p>
                                <div class="row">
                                    <div class="col d-flex align-items-stretch">
                                        <p class="btn btn-danger btn-block">{{$product->Price}} $</p>
                                    </div>
                                    <div class="col d-flex align-items-stretch">
                                        <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
@endsection