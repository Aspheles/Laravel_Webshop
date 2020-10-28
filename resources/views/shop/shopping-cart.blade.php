@extends('layouts.app')

@section('content')
{{-- <div class="row justify-content-center m-5">
    <h1>Shopping Cart</h1>
    @if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge">{{$product['qty']}}</span>
                        <strong>{{$product['item']['title']}}</strong>
                        <span class="label label-success">{{$product['price']}}</span>
                        <div class="btn-group">
                            <button type="button" data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">
                                Action: <span class="caret"></span>
                                <ul class="dropdown-menu">
                                    <li><a href="#"></a>Reduce by 1</li>
                                    <li><a href="#"></a>Reduce All</li>
                                    
                                </ul>
                            </button>
                        </div>

                    </li>

                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <button class="btn btn-success" type="button">Checkout</button>
            </div>
        </div>
    </div>

    @else
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <h2>No Items in Cart</h2>
        </div>
    </div>

    @endif
        
</div> --}}


<div class="container mb-4">
    @if(Session::has('cart'))
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($products)}} --}}
                        @foreach($products as $product)
                        {{-- {{dd($product)}} --}}
                        <tr>
                            <td><img height="50" src="../images/{{$product['item']['Image']}}" /> </td>
                            <td>{{$product['item']['ProductName']}}</td>
                            <td>In stock</td>
                            <td style="text-align: center">{{$product['qty']}}</td>
                            <td class="text-right">{{$product['price']}}</td>
                            <td class="text-right">
                                <a href="{{route('product.updateQuantity', ['item' => $product['item']])}}" class="btn btn-sm btn-success "><i class="fa fa-plus"></i></a>
                                <a class="btn btn-sm btn-warning "><i class="fa fa-minus"></i></a>
                                <a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> 
                            </td>
                        </tr>
                       @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">255,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{$totalPrice}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @else

        <h2>No Products in Shopping cart</h2>
        @endif
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6 text-right">
                    <a class="btn btn-lg btn-block btn-warning text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
