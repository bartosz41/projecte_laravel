@extends('layouts.app')
@section('content')

<h1>Games list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Players</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($games as $game)
        <tr>
            <th scope="row">{{$game->id}}</th>
            <td>{{$game->name}}</td>
            <td>{{$game->players}}</td>
            <td>{{$game->price}}</td>
            <td>
                <img style="max-height:50px;" src="{{$game->image}}">
            {{$game->image}}</td>
            <td>
                <a href="/edit-game/{{$game->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-game/{{$game->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
