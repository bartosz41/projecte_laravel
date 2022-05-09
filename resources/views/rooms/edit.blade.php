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

  <form action="/update-room/{{$room->id}}" method="POST">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h1>Edit {{$room->id}}</h1>
    <hr>

    <input type="hidden" name="room_id" value="{{$room->id}}">

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" maxlength="300" class="form-control" value="{{old('image',$room->image)}}" type="text" required>
        <label for="floatingName">Image (URL)</label>
        @if ($errors->has('image'))
            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
        @endif
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Edit</button>
</div>
</form>
@endsection
