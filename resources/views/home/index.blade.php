@extends('layouts.app-master')

@section('content')
    <div class="p-5 rounded" style="margin-top:10px;">
        <div id="app">
        @auth
        <h1 class="text-light">Dashboard</h1>
        <hr style="color: white">
        <br>
        @if(auth()->user()->role == "User")
            <!--<last-reserve-component></last-reserve-component>-->
            <h3 class="text-light">Last reserve</h3>
            <last-reserve-component></last-reserve-component>
            <script>
                window.user_id = @json(auth()->user()->id);
            </script>
        @endif
        @if(auth()->user()->role == "Admin")
            <span class="text-light">You are currently logged as an Administrator.</span>
        @endif
        @endauth

        @guest

            <h2 class="text-light">Rooms</h2>
            <p class="lead text-light">Our play rooms.</p>

            <slider-component></slider-component>
            
            <h2 class="text-light">Games</h2>
            <p class="lead text-light">Down here you can see all the games.</p>

            <games-component></games-component>

        @endguest
        </div>
    </div>
@endsection
