@extends('layouts.app')


@section('content')
    <h1>Customer page</h1>
    @foreach($customers as $customer)
    {{$customer->FirstName}}
    {{$customer->LastName}}
    {{$customer->Street}}

    @endforeach
@endsection