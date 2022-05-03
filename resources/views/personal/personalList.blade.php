@extends('layouts.app')
@section('content')

@if(sizeof($staff) < 1)
    <div class="alert alert-danger">
        <ul class="list-group">
            <li class="list-group-item">
                <span>No results found.</span>
            </li>
        </ul>
    </div>
 @endif

<h1>Staff list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
    </tr>
  </thead>
  <tbody>
    @foreach($staff as $personal)
        <tr>
            <th scope="row">{{$personal->dni}}</th>
            <td>{{$personal->name}}</td>
            <td>{{$personal->surname}}</td>
            <td>
                <a href="/edit-staff/{{$personal->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-staff/{{$personal->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
