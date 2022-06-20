@extends('layouts.app-master')
@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item">
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div id="app">
        <edit-staff-component></edit-staff-component>
    </div>

@endsection
