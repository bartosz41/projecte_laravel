@extends('layouts.app')
@section('content')

<h1>Users list</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="/edit-user/{{$user->id}}" class="btn btn-primary">Edit</a>
                <a href="/delete-user/{{$user->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection
