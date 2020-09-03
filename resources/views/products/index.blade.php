@extends('layouts.app')

@section('content')
<h1>Products page</h1>
    @foreach($products as $product)
        {{$product->ProductName}}
    @endforeach
@endsection

