@extends('layouts.app-master')

@section('content')
    <form method="post" action="/save-reserve/{{$reserve->id}}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal centered" style="margin-top: 100px">Configure reserve</h1>

        <input type="hidden" name="user_id">

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input name="date" class="form-control" value="{{old('date',$reserve->date)}}" type="datetime-local">
            <label for="floatingName">Date</label>
            @if ($errors->has('date'))
                <span class="text-danger text-left">{{ $errors->first('date') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="number" min="0" class="form-control" name="players" value="{{ old('players',$reserve->players) }}" placeholder="Players" required="required" autofocus>
            <label for="floatingName">Players</label>
            @if ($errors->has('players'))
                <span class="text-danger text-left">{{ $errors->first('players') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <input type="text" class="form-control" name="player_names" value="{{ old('player_names',$reserve->player_names) }}" placeholder="Player names" required="required" autofocus>
            <label for="floatingName">Player names</label>
            @if ($errors->has('player_names'))
                <span class="text-danger text-left">{{ $errors->first('player_names') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="width:40%;">
            <select type="text" class="form-control" name="game_id" value="{{ old('game_id',$reserve->game_id) }}" placeholder="Game" required="required" autofocus>
                @foreach($games as $game)
                <option value="{{$game->id}}">{{$game->name}} ({{$game->price}}€)</option>
                @endforeach
            </select>
            <label for="floatingName">Game</label>
            @if ($errors->has('game_id'))
                <span class="text-danger text-left">{{ $errors->first('game_id') }}</span>
            @endif
        </div>

        <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Configure</button>
    </form>
@endsection
