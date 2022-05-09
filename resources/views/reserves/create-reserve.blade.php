@extends('layouts.app-master')

@section('content')
<div class="row">
    <form class="col-md-8" method="post" action="/create-reserve/{{auth()->user()->id}}" style="float: left;">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal centered text-light" style="margin-top: 50px">Create reserve</h1>
        <h4 class="text-light">Reserves policies.</h4>
        <p style="width: 40%;" class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <input type="hidden" name="user_id">

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Organization" required="required" autofocus>
            <label for="floatingName">Organization</label>
            @if ($errors->has('organization'))
                <span class="text-danger text-left">{{ $errors->first('organization') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone" required="required" autofocus>
            <label for="floatingName">Phone</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="Country" required="required" autofocus>
            <label for="floatingName">Country</label>
            @if ($errors->has('country'))
                <span class="text-danger text-left">{{ $errors->first('country') }}</span>
            @endif
        </div>
        <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Create reserve</button>
    </form>
    <div class="col-md-4">
        <img src="https://cdn-icons-png.flaticon.com/512/2907/2907150.png" style="float:right;width:400px;height:400px;margin-top:40%;">
    </div>
</div>
@endsection
