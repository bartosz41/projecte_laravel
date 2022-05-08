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

  <form action="/update-game/{{$game->id}}" method="POST">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h1>Edit {{$game->name}}</h1>
    <hr>

    <input type="hidden" name="game_id" value="{{$game->id}}">

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" class="form-control" value="{{old('name',$game->name)}}" type="text">
        <label for="floatingName">Name</label>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" class="form-control" value="{{old('image',$game->image)}}" type="text">
        <label for="floatingName">Image (URL)</label>
        @if ($errors->has('image'))
            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="players" class="form-control" value="{{old('players',$game->players)}}" type="text">
        <label for="floatingName">Players</label>
        @if ($errors->has('players'))
            <span class="text-danger text-left">{{ $errors->first('players') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="price" class="form-control" value="{{old('price',$game->price)}}" type="text">
        <label for="floatingName">Price</label>
        @if ($errors->has('price'))
            <span class="text-danger text-left">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Edit</button>
</div>
</form>
@endsection
