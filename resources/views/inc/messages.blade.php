@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger m-3">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div id="success" class="alert alert-success m-3 text-center">
        <h3>{{session('success')}}</h3>
    </div>
@endif


@if(session('error'))
    <div id="error" class="alert alert-danger m-3 text-center">
        <h3>{{session('error')}}</h3>
    </div>
@endif

