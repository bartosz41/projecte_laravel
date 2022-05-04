@extends('layouts.app')
@section('content')
<style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
        padding: 16px;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
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

    <a href="/user-list/" class="btn btn-secondary">Back to list</a><br>

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

  <form action="/update-user/{{$user->id}}" method="POST">
  @csrf
  <div class="container">
    <h1>Edit {{$user->name}}</h1>
    <hr>

    <input type="hidden" name="user_id" value="{{$user->id}}">
    <label for="email"><b>Email</b></label>
    <input value="{{old('email',$user->email)}}" type="text" placeholder="Enter Email" name="email" id="email" >

    <label for="name"><b>Name</b></label>
    <input value="{{old('name',$user->name)}}" type="text" placeholder="Enter Name" name="name" id="name" >

    <label for="dni"><b>DNI</b></label>
    <input value="{{old('dni',$user->dni)}}" type="text" placeholder="Enter DNI" name="dni" id="dni" >

    <label for="name"><b>Organization</b></label>
    <input value="{{old('organization',$user->organization)}}" type="text" placeholder="Enter Organization" name="organization" id="organization" >

    <label for="phone"><b>Phone</b></label>
    <input value="{{old('phone',$user->phone)}}" type="text" placeholder="Enter Phone" name="phone" id="phone" >

    <label for="country"><b>Country</b></label>
    <input value="{{old('country',$user->country)}}" type="text" placeholder="Enter Country" name="country" id="country" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" >

    <button type="submit" class="registerbtn">Submit</button>
  </div>
</form>
@endsection
