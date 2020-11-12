@extends('layouts.app')


@section('content')

    <!-- Page Content -->
 

    <div class="row justify-content-center">

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="../images/{{$product->image}}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <h4>${{$product->price}}</h4>
            <p class="card-text">{{$product->description}}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>-           
          </div>
        </div>
      

</div>-      <!-- /.col-lg-9 -->

    </div>
  
<!-- /.container -->
@endsection