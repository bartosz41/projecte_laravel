@extends('layouts.app-master')

@section('content')

@if(sizeof($games) < 1)
    <div class="alert alert-danger">
        <ul class="list-group">
            <li class="list-group-item">
                <span>No results found.</span>
            </li>
        </ul>
    </div>
 @endif

<h3 style="margin-top: 20px">Games</h3>

<a class="btn btn-lg btn-primary" href="/new-game" style="width:20%;" type="submit"> + New Game</a>

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