@extends('layouts.app')
@section('content')

@if(sizeof($rooms) < 1)
    <div class="alert alert-danger">
        <ul class="list-group">
            <li class="list-group-item">
                <span>No results found.</span>
            </li>
        </ul>
    </div>
 @endif

<h1>Rooms list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Current Game</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rooms as $room)
        <tr>
            <th scope="row">{{$room->id}}</th>
            <td>{{$room->id}}</td>
            <td>{{$room->id}}</td>
            <td>
                <a href="/delete-game/{{$room->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
