{{-- @extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="categories">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
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
                                        <a href="/categories/show?{{$category->id}}" class="custom-control-label" for="{{$category->name}}">{{$category->name}}</a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    
                    </ul>
                </div>
                <div class="col">
                    <div class="row">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="btn btn-danger btn-block">99.00 $</p>
                                                    </div>
                                                    <div class="col">
                                                        <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                    @endif
                    </div>
                </div>
            
    </div>
   
</div>
@endsection --}}

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
                    
                    @if(count($filteredproducts) > 0)
                        @foreach($filteredproducts as $filteredproduct)
                        <div class="col-5">
                            <div class="card m-2">
                                <img class="card-img-top d-flex align-items-stretch" src="../images/{{$filteredproduct->Image}}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="/products/{{$filteredproduct->Product_ID}}" title="View Product">{{$filteredproduct->ProductName}}</a></h4>
                                    <p class="card-text">{{$filteredproduct->Description}}</p>
                                    <p>Category id: {{$filteredproduct->category_id}}</p>
                                    <div class="row">
                                        <div class="col d-flex align-items-stretch">
                                            <p class="btn btn-danger btn-block">{{$filteredproduct->Price}} $</p>
                                        </div>
                                        <div class="col d-flex align-items-stretch">
                                            <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection