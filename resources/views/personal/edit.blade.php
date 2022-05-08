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

  <form action="/update-staff/{{$staff->id}}" method="POST">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h3>Edit {{$staff->name}}</h3>
    <hr>

    <input type="hidden" name="staff_id" value="{{$staff->id}}">
    <div class="form-group form-floating mb-3" style="width:40%;">
      <input name="name" class="form-control" value="{{old('name',$staff->name)}}" type="text">
      <label for="floatingName">Name</label>
      @if ($errors->has('name'))
          <span class="text-danger text-left">{{ $errors->first('name') }}</span>
      @endif
  </div>

  <div class="form-group form-floating mb-3" style="width:40%;">
    <input name="surname" class="form-control" value="{{old('surname',$staff->surname)}}" type="text">
    <label for="floatingName">Surname</label>
    @if ($errors->has('surname'))
        <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3" style="width:40%;">
  <input name="dni" class="form-control" value="{{old('dni',$staff->dni)}}" type="text">
  <label for="floatingName">DNI</label>
  @if ($errors->has('dni'))
      <span class="text-danger text-left">{{ $errors->first('dni') }}</span>
  @endif
</div>

<button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Edit</button>
</div>
</form>
@endsection
