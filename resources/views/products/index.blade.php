@extends('layouts.app')

@section('content')
{{-- <h1>Producten</h1>
@if(count($products) > 0)
    @foreach($products as $product)
        <div class="card bg-light p-3">
            <div class="card-body">
                <img class=" float-right"height="300px" width="500px" src="images/{{$product->Image}}">
                <h3 class="mb-0"><a>{{$product->ProductName}}</a></h3>
                <br />
                <small class="mb-0">{{$product->Description}}</small>
            </div>
        </div>
    @endforeach
@else
    <p>No posts found</p>
@endif --}}




 <!-- Page Content -->
 <div class="container">

    <div class="row justify-content-center">

     
      <!-- /.col-lg-3 -->

      <div class="col-lg-12">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://blogs.glowscotland.org.uk/fi/public/inverkeithinghsmusic/uploads/sites/10406/2018/02/Music-banner-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://blogs.glowscotland.org.uk/fi/public/inverkeithinghsmusic/uploads/sites/10406/2018/02/Music-banner-1.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://blogs.glowscotland.org.uk/fi/public/inverkeithinghsmusic/uploads/sites/10406/2018/02/Music-banner-1.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
        @if(count($products) > 0)
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="images/{{$product->Image}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                            <a href="/products/{{$product->Product_ID}}">{{$product->ProductName}}</a>
                            </h4>
                            <h5>${{$product->Price}}</h5>
                            <p class="card-text">{{$product->Description}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                        </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <p>No Products found</p>
                @endif

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection

