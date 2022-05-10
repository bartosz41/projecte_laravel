@extends('layouts.app-master')
@section('content')



<form method="post" action="/validate-reserve-save/{{$reserve->id}}">

    <h1 class="h3 mb-3 fw-normal centered text-light" style="margin-top: 100px">Validate reserve</h1>
    @csrf
    <hr>

    <div class="row d-flex">
        <div class="col-md-6 form-group form-floating mb-3">
            <select type="text" class="form-control" name="room_id" value="{{ old('room_id',$reserve->room_id) }}" placeholder="Game" required="required" autofocus>
                @foreach($rooms as $room)
                    @if(!$room->game_id)
                        <option value="{{$room->id}}">{{$room->id}}</option>
                    @endif
                @endforeach
            </select>
            <label for="floatingName" style="margin-left: 5px">Room</label>
            @if ($errors->has('room_id'))
                <span class="text-danger text-left">{{ $errors->first('room_id') }}</span>
            @endif
        </div>
        <div class="col-md-6 form-group form-floating mb-3">
            <select type="text" class="form-control" name="game_id" value="{{ old('game_id',$reserve->game_id) }}" placeholder="Game" required="required" autofocus>
                @foreach($games as $game)
                <option value="{{$game->id}}">{{$game->name}}</option>
                @endforeach
            </select>
            <label for="floatingName" style="margin-left: 5px">Game</label>
            @if ($errors->has('game_id'))
                <span class="text-danger text-left">{{ $errors->first('game_id') }}</span>
            @endif
        </div>
        <div class="col-md-6 form-group form-floating mb-3">
            <select type="text" class="form-control" name="personal_id" value="{{ old('personal_id',$reserve->personal_id) }}" placeholder="Game" required="required" autofocus>
                @foreach($staff as $personal)
                <option value="{{$personal->id}}">{{$personal->name}}</option>
                @endforeach
            </select>
            <label for="floatingName" style="margin-left: 5px">Personal</label>
            @if ($errors->has('personal_id'))
                <span class="text-danger text-left">{{ $errors->first('personal_id') }}</span>
            @endif
        </div>
        <div class="col-md-6 form-group form-floating mb-3">
            <label for="floatingName" class="text-light" style="margin-left: 5px">Finished</label>
            @if($reserve->finished === 0)
                <input class="" type="checkbox" name="finished" value="false">
            @endif
            @if($reserve->finished === 1)
                <input class="" type="checkbox" name="finished" value="true">
            @endif
        </div>
    </div>
    <button class="btn btn-lg btn-success" style="width:20%;" type="submit">Save</button>

</form>

@endsection