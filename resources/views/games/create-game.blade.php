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

<form action="/create-game" method="POST">
  @csrf
  <div class="container">
    <h1>Create a game</h1>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>

    <label for="image"><b>Image (URL)</b></label>
    <input type="text" id="image" name="image" placeholder="Image">
    <br>
    <br>

    <label for="players"><b>Players</b></label>
    <input type="number" placeholder="Players" name="players" id="players" required>
        <br>
    <label for="price"><b>Price</b></label>
    <input type="number" placeholder="Price" name="price" id="price" required>
    <hr>

    <button type="submit" class="registerbtn">Create</button>
  </div>
</form>
@endsection
