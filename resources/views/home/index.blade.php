@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <div id="app">
        @auth
        <h1>Dashboard</h1>
            <!--<last-reserve-component></last-reserve-component>-->

        @endauth

        @guest

            <h2>Rooms</h2>
            <p class="lead">Our play rooms.</p>

            <slider-component></slider-component>
            
            <h2>Games</h2>
            <p class="lead">Down here you can see all the games.</p>

            <games-component></games-component>

        @endguest
        </div>
    </div>
@endsection
