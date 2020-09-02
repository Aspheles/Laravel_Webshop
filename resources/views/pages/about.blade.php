@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center m-5">
        <h1>{{$title}}</h1>
        <p>Welcome we are xx corparation, we are a small buisness located in the Netherlands selling xx and providing full support</p>
        <p><a class="btn btn-primary btn-lg" href="web_shop/public/login">Login</a> <a class="btn btn-success btn-lg" href="web_shop/public/register" role="button">Register</a></p>
    </div>
@endsection
