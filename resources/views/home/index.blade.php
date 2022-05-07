@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        @endauth

        @guest
        <h1>Games</h1>
        <p class="lead">Down here you can see all the games.</p>
        @endguest
    </div>
    @guest
    <div id="app">
        <home-component></home-component>
    </div>
    @endguest
@endsection
