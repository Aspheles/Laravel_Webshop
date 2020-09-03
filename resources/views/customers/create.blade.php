@extends('layouts.app')


@section('content')
    <h1>Create Customer</h1>
    {!! Form::open(['action' => 'CustomersController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'First Name')}}
        {{Form::text('FirstName', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Last Name')}}
        {{Form::text('LastName', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Street')}}
        {{Form::text('Street', '', ['class' => 'form-control', 'placeholder' => 'Street'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'City')}}
        {{Form::text('City', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Zip')}}
        {{Form::text('Zip', '', ['class' => 'form-control', 'placeholder' => 'Zip'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Phone')}}
        {{Form::text('Phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-dark'])}}
    {!! Form::close() !!}
@endsection