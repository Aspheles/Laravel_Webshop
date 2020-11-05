@extends('layouts.app')

@section('content')
<div class="row justify-content-center m-5 ">
    <div class="col-md-8 col-md-offset-2">
    <h1>My orders</h1>
    <hr>
    @foreach($orders as $order)
    <div class="panel panel-default m-3">
        <div class="panel-body">
            <ul class="list-group">
                @foreach($items as $item)

                <li class="list-group-item">
                    <span class="badge">€{{$item['price']}}</span>
                    {{$item['item_name']}} <span class="badge badge-secondary badge-pill">{{$item['quantity']}}</span>
                </li>
               
                
                @endforeach
                
            </ul>
        </div>
        <div class="panel-footer">
            <strong>Total Price: €{{$order->totalamount}}</strong>
        </div>
        <a href="{{route('product.cancelOrder', ['id' => $order->id])}}" class="btn btn-sm btn-danger m-2 text-white">Cancel order</a>
        <hr>
    </div>
    @endforeach

</div>
</div>
@endsection
