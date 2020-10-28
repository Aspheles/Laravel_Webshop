{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">{{config('app.name', 'WebShop')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/customers">Customers</a>
          </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li  class="p-3"><a href="/posts/create">Create Post</a></li>
        <li class="p-3"><a href="/customers/create">Register Customer</a></li>
      </ul>
    </div>
  </nav> --}}


  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">{{config('app.name', 'WebShop')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/categories">Store</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/products">Products</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="{{route('product.getShoppingCart')}}">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">{{Session::has('cart') ? Session::get('cart')->totalQuantity > 0 : ''}}</span>
                </a>
               
               
               @if(Auth::check())
                <a class="btn btn-danger btn-sm ml-3" href="{{route('user.profile')}}">
                  <i class="fa fa-user"></i> User Profile
                  <span class="badge badge-light"></span>
                </a>
                <a class="btn btn-danger btn-sm ml-3" href="{{route('user.logout')}}">
                  <i class="icon-signout"></i> Logout
                  <span class="badge badge-light"></span>
                </a>
               @else
                <a class="btn btn-danger btn-sm ml-3" href="{{route('user.signin')}}">
                  <i class="fa fa-user"></i> Login
                  <span class="badge badge-light"></span>
                </a>
               @endif
                
                

                
            </form>
        </div>
    </div>
</nav>

{{-- <section class="jumbotron text-center">
  <div class="container">
      <h1 class="jumbotron-heading">E-COMMERCE CATEGORY</h1>
      <p class="lead text-muted mb-0">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte...</p>
  </div>
</section> --}}