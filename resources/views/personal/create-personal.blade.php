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

<form action="/create-personal" method="POST" id="form">
  @csrf
  <div class="container" style="margin-top:20px;">
    <h1 class="text-light">Create staff</h1>
    <hr>

    <div class="form-group form-floating mb-3" style="width:40%;">
      <input name="name" maxlength="50" class="form-control" type="text">
      <label for="floatingName">Name</label>
      @if ($errors->has('name'))
          <span class="text-danger text-left">{{ $errors->first('name') }}</span>
      @endif
  </div>

  <div class="form-group form-floating mb-3" style="width:40%;">
    <input name="surname" maxlength="50" class="form-control" type="text">
    <label for="floatingName">Surname</label>
    @if ($errors->has('surname'))
        <span class="text-danger text-left">{{ $errors->first('surname') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3" style="width:40%;">
  <input name="dni" id="dni" maxlength="9" minlength="0" class="form-control" type="text">
  <label for="floatingName">DNI</label>
  @if ($errors->has('dni'))
      <span class="text-danger text-left">{{ $errors->first('dni') }}</span>
  @endif
</div>


<button class="btn btn-lg btn-primary" style="width:20%;" id="submit" type="submit">Create</button>
</div>
</form>
<script>
    window.onload = function(){
        // SUBMIT BUTTON
        let submitBtn = document.getElementById('submit');

        submitBtn.disabled = true;
        
        // FIELDS TO VALIDATE
        let dniField = document.getElementById('dni');
        dniField.addEventListener('input',()=>{
            console.log("trigger");
            nif(dniField.value);
        })

        function nif(dni) {
            var number;
            var char;
            var letter;
            var regular_expresion_dni;
            
            regular_expresion_dni = /^\d{8}[a-zA-Z]$/;
            
            if(regular_expresion_dni.test (dni) == true){
                number = dni.substr(0,dni.length-1);
                char = dni.substr(dni.length-1,1);
                number = number % 23;
                letter='TRWAGMYFPDXBNJZSQVHLCKET';
                letter=letter.substring(number,number+1);
                if (letter!=char.toUpperCase()) {
                    submitBtn.disabled = true;
                }else{
                    submitBtn.disabled = false;
                }
            }else{
                submitBtn.disabled = true;
            }
        }
    }
</script>
@endsection
