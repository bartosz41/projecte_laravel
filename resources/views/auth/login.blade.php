@extends('layouts.auth-master')

@section('content')

<div id="app">
  <form method="post" action="{{ route('login.perform') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h1 class="h3 mb-3 fw-normal centered" style="margin-top: 100px">Login</h1>

    @include('layouts.partials.messages')

    <center>
    <div class="form-group form-floating mb-3" style="width:20%;">
        <input type="email" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
        <label for="floatingName">Email</label>
        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:20%;">
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
        <label for="floatingPassword">Password</label>
        @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
    </div>
  </center>

    <div class="form-group mb-3">
        <label for="remember">Remember me</label>
        <input type="checkbox" name="remember" value="1">
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" id="submit" type="submit">Login</button>

    @include('auth.partials.copy')
</form>
</div>
@endsection
