@extends('layouts.app')
@section('content')
<style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
        padding: 16px;
        }

        /* Full-width input fields */
        input[type=text], input[type=number] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        input[type=text]:focus, input[type=number]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        .registerbtn:hover {
        opacity:1;
        }

        /* Add a blue text color to links */
        a {
        color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
        background-color: #f1f1f1;
        text-align: center;
        }
    </style>

    <a href="/game-list/" class="btn btn-secondary">Back to list</a><br>

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

  <form action="/update-game/{{$game->id}}" method="POST">
  @csrf
  <div class="container">
    <h1>Edit {{$game->name}}</h1>
    <hr>

    <input type="hidden" name="game_id" value="{{$game->id}}">
    <label for="name"><b>Name</b></label>
    <input value="{{old('name',$game->name)}}" type="text" placeholder="Enter Name" name="name" id="name" >

    <label for="image"><b>Image (URL)</b></label>
    <input value="{{old('image',$game->image)}}" type="text" placeholder="Enter Image" name="image" id="image" >

    <label for="players"><b>Players</b></label>
    <input value="{{old('players',$game->players)}}" type="number" placeholder="Players" name="players" id="players">
        <br>
    <label for="price"><b>Price</b></label>
    <input value="{{old('price',$game->price)}}" type="number" placeholder="Price" name="price" id="price">
    <hr>

    <button type="submit" class="registerbtn">Submit</button>
  </div>
</form>
@endsection
