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

<form action="/create-personal" method="POST">
  @csrf
  <div class="container" style="margin-top:20px;">
    <h1>Create staff</h1>
    <hr>

    <div class="form-group form-floating mb-3" style="width:40%;">
      <input name="name" class="form-control" type="text">
      <label for="floatingName">Name</label>
      @if ($errors->has('name'))
          <span class="text-danger text-left">{{ $errors->first('name') }}</span>
      @endif
  </div>

  <div class="form-group form-floating mb-3" style="width:40%;">
    <input name="surname" class="form-control" type="text">
    <label for="floatingName">Surname</label>
    @if ($errors->has('surname'))
        <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3" style="width:40%;">
  <input name="dni" class="form-control" type="text">
  <label for="floatingName">DNI</label>
  @if ($errors->has('dni'))
      <span class="text-danger text-left">{{ $errors->first('dni') }}</span>
  @endif
</div>


<button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Create</button>
</div>
</form>
@endsection
