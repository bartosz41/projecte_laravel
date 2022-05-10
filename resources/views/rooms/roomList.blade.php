@extends('layouts.app-master')
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

 <h3 style="margin-top: 20px" class="text-light">Rooms</h3>

 <a class="btn btn-lg btn-primary text-light" href="/new-room" style="width:20%;" type="submit"> + New Room</a>


<table class="table text-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Game_ID</th>
      <th scope="col">Staff_ID</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rooms as $room)
        <tr>
            <th scope="row">{{$room->id}}</th>
            <td>{{$room->game_id}}</td>
            <td>{{$room->staff_id}}</td>
            <td>
              <img style="max-height:50px;" src="{{$room->image}}">
              {{$room->image}}</td>
            <td>
                <a href="/edit-room/{{$room->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-room/{{$room->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>

@endsection
