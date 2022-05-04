@extends('layouts.app')
@section('content')

@if(sizeof($users) < 1)
    <div class="alert alert-danger">
        <ul class="list-group">
            <li class="list-group-item">
                <span>No results found.</span>
            </li>
        </ul>
    </div>
 @endif

<h1>Users list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">DNI</th>
      <th scope="col">Organization</th>
      <th scope="col">Phone</th>
      <th scope="col">Country</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->dni}}</td>
            <td>{{$user->organization}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->country}}</td>
            <td>
                <a href="/edit-user/{{$user->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-user/{{$user->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
