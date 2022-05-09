@extends('layouts.app-master')

@section('content')


<h3 style="margin-top: 20px;background-color:	#808080;padding:10px;color:white;">My reserves</h3>
<div style="background-color:#D3D3D3;padding:10px;">
<table class="table">
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
                    <a href="/detail-reserve/{{$reserve->id}}" class="btn btn-primary">Details</a>
                    <a href="/delete-reserve/{{$reserve->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection
