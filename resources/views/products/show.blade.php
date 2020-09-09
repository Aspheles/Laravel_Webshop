@extends('layouts.app')


@section('content')
<a href="/products" class="btn btn-light">Go Back</a>
    <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="../images/{{$product->Image}}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$product->ProductName}}</h3>
            <h4>$24.99</h4>
            <p class="card-text">{{$product->Description}}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
      

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
@endsection