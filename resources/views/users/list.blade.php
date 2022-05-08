@extends('layouts.app-master')
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

 <h3 style="margin-top: 20px">Users</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">DNI</th>
      <th scope="col">Organization</th>
      <th scope="col">Phone</th>
      <th scope="col">Country</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->email}}</th>
            <td>{{$user->dni}}</td>
            <td>{{$user->organization}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->country}}</td>
            <td>{{$user->role}}</td>
            <td>
                <a href="/edit-user-admin/{{$user->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-user/{{$user->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>

@endsection
