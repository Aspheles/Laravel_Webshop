@extends('layouts.app')

@section('content')
<div class="row justify-content-center m-5">
    <div class="row justify-content-center">

        <div class="col-8 mobile-pull">
            <article role="login">
              <h3 class="text-center"><i class="fa fa-lock"></i>USER</h3>
              <form class="signup" action="{{route('user.signin')}}" method="post">
                {{-- <div class="form-group">
                  <input type="text" class="form-control" placeholder="UserName">
                </div> --}}
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                {{-- <div class="form-group">
                  <input type="password" class="form-control" placeholder="Confirm Password">
                </div> --}}
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Please accept the terms and conditions to proceed with your request.
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block"  value="SUBMIT">Login</button>
                  {{ csrf_field() }}
                </div>
              </form>
            </article>
          </div>
</div>
@endsection
