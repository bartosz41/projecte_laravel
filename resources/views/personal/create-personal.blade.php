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
        <create-staff-component></create-staff-component>
    </div>
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
