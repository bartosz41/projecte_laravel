@extends('layouts.app-master')

@section('content')
    <div class="p-5 rounded" style="margin-top:10px;">
        <div id="app">
        @auth
        <h1>Dashboard</h1>
        <hr>
        <br>
            <!--<last-reserve-component></last-reserve-component>-->
            <h3>Last reserve</h3>
        <last-reserve-component></last-reserve-component>
        <script>
            window.user_id = @json(auth()->user()->id);
        </script>
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
