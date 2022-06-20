<template>
    <form id="form" @submit="formSubmit">
    @csrf
    <div class="container" style="margin-top:20px;">
        <h1 class="text-light">Create staff</h1>
        <hr>

        <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" v-model="name" maxlength="50" class="form-control" type="text">
        <label for="floatingName">Name</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="surname" v-model="surname" maxlength="50" class="form-control" type="text">
        <label for="floatingName">Surname</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
    <input name="dni" id="dni" v-model="dni" maxlength="9" minlength="0" class="form-control" type="text">
    <label for="floatingName">DNI</label>
    </div>


    <button class="btn btn-lg btn-primary" style="width:20%;" id="submit" type="submit">Create</button>
    </div>
    </form>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        },
        data(){
            return{
                user : [],
                name : "",
                surname : "",
                dni : ""
            }
        },
        methods:
            {
                formSubmit(e){
                    e.preventDefault();
                    let currentObj = this;
                    axios.post('/api/create-staff', {
                        name: this.name,
                        surname: this.surname,
                        dni: this.dni
                    }).then(function (response) {
                        console.log(response)
                        if(response){
                            if(response.data){
                                if(response.data.created == "staff_created"){
                                    window.location = "/staff-list";
                                }else{
                                    window.location = "/new-staff";
                                }
                            }
                        }
                    })
                }
            }
    }
</script>
