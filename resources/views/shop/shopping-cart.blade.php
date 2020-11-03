@extends('layouts.app')

@section('content')
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
                            <th scope="col" class="text-right">Empty</th>
                            
                             
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($products)}} --}}
                        @foreach($products as $product)
                        {{-- {{dd($product)}} --}}
                        <tr>
                            <td><img height="50" src="../images/{{$product['item']['image']}}" /> </td>
                            <td>{{$product['item']['name']}}</td>
                            <td>In stock</td>
                            <td style="text-align: center">{{$product['qty']}}</td>
                            <td class="text-right">{{$product['price']}}</td>
                            <td class="text-right">
                                <a href="{{route('product.updateQuantity', ['item' => $product['item'], 'add'])}}" class="btn btn-sm btn-success "><i class="fa fa-plus"></i></a>
                                <a href="{{route('product.updateQuantity', ['item' => $product['item'], 'minus'])}}" class="btn btn-sm btn-warning "><i class="fa fa-minus"></i></a>
                                <a href="{{route('product.removeFromCart', ['id' => $product['item']])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> 
                            </td>
                        </tr>
                       @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">€ 0</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">€ 0</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>€ {{$totalPrice}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6 text-right">
                    <a href="/categories" class="btn btn-lg btn-block btn-warning text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="{{route('product.getCheckout')}}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger m-3">
            <h2 style="text-align: center; margin: 20px;">No Products found in Shopping cart</h2>
        </div>
       
        @endif
        
    </div>
</div>

@endsection


