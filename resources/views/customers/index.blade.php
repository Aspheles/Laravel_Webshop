@extends('layouts.app')


@section('content')
    <h1>Customer page</h1>
    <hr>
    @foreach($customers as $customer)
    {{$customer->Customer_ID}}
    {{$customer->FirstName}}
    {{$customer->LastName}}
    {{$customer->Street}}
    {{$customer->Zip}}
    {{$customer->Phone}}
    <br />

    @endforeach
@endsection