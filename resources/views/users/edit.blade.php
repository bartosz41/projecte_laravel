@extends('layouts.app-master')
@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item">
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

  <form action="/update-user-admin/{{$user->id}}" method="POST">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h1>Edit {{$user->id}}</h1>
    <hr>

    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="email" class="form-control" value="{{old('email',$user->email)}}" type="text">
        <label for="floatingName">Email</label>
        @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" class="form-control" value="{{old('name',$user->name)}}" type="text">
        <label for="floatingName">Name</label>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>


    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="dni" class="form-control" value="{{old('dni',$user->dni)}}" type="text">
        <label for="floatingName">DNI</label>
        @if ($errors->has('dni'))
            <span class="text-danger text-left">{{ $errors->first('dni') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="organization" class="form-control" value="{{old('organization',$user->organization)}}" type="text">
        <label for="floatingName">Organization</label>
        @if ($errors->has('organization'))
            <span class="text-danger text-left">{{ $errors->first('organization') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="phone" class="form-control" value="{{old('phone',$user->phone)}}" type="text">
        <label for="floatingName">Phone</label>
        @if ($errors->has('phone'))
            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="country" class="form-control" value="{{old('country',$user->country)}}" type="text">
        <label for="floatingName">Country</label>
        @if ($errors->has('country'))
            <span class="text-danger text-left">{{ $errors->first('country') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="role" class="form-control" value="{{old('role',$user->role)}}" type="text">
        <label for="floatingName">Role</label>
        @if ($errors->has('role'))
            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
        @endif
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Edit</button>
</div>
</form>
@endsection