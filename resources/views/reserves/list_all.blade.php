@extends('layouts.app-master')

@section('content')

<h3 class="text-light" style="margin-top: 20px">All reserves</h3>
<table class="table text-light">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        <th scope="col">Validated</th>
      </tr>
    </thead>
    <tbody>
        @foreach($reserves as $reserve)
            <tr>
                <th scope="row">{{$reserve->name}}</th>
                <td>{{$reserve->email}}</td>
                <td>{{$reserve->date}}</td>
                <td>{{$reserve->validated}}</td>

                <td>
                    <a href="/validate-reserve/{{$reserve->id}}" class="btn btn-success">Validate</a>
                    <a href="/delete-reserve/{{$reserve->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
      </tbody>
  </table>

@endsection
