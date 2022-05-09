@extends('layouts.app-master')
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

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" maxlength="50" class="form-control" type="text">
        <label for="floatingName">Name</label>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" maxlength="300" class="form-control" type="text">
        <label for="floatingName">Image (URL)</label>
        @if ($errors->has('image'))
            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="players" min="0" max="12" class="form-control" type="number">
        <label for="floatingName">Players</label>
        @if ($errors->has('players'))
            <span class="text-danger text-left">{{ $errors->first('players') }}</span>
        @endif
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="price" min="0" max="100" class="form-control" type="number">
        <label for="floatingName">Price (€)</label>
        @if ($errors->has('price'))
            <span class="text-danger text-left">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Create</button>
  </div>
</form>
@endsection
