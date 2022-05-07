@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal centered" style="margin-top: 100px">Register</h1>
    <center>
        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="DNI" required="required" autofocus>
            <label for="floatingName">DNI</label>
            @if ($errors->has('dni'))
                <span class="text-danger text-left">{{ $errors->first('dni') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Organization" required="required" autofocus>
            <label for="floatingName">Organization</label>
            @if ($errors->has('organization'))
                <span class="text-danger text-left">{{ $errors->first('organization') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone" required="required" autofocus>
            <label for="floatingName">Phone</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="Country" required="required" autofocus>
            <label for="floatingName">Country</label>
            @if ($errors->has('country'))
                <span class="text-danger text-left">{{ $errors->first('country') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:20%;">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </center>
        <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Register</button>

        @include('auth.partials.copy')
    </form>
@endsection
