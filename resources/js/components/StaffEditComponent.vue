<template>
  <form @submit="formSubmit">
    @csrf
    <div class="container" style="margin-top: 20px">
        <h3 class="text-light">Edit</h3>
        <hr>

        <input type="hidden" name="staff_id" id="staff_id" :value="staff_id">

        <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" id="name" minlength="0" maxlength="50" class="form-control" :value="staff.name" type="text">
        <label for="floatingName">Name</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="surname" id="surname" minlength="0" maxlength="50" class="form-control" :value="staff.surname" type="text">
        <label for="floatingName">Surname</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
    <input name="dni" maxlength="9" id="dni" minlength="0" class="form-control" :value="staff.dni" type="text">
    <label for="floatingName">DNI</label>
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;" type="submit">Edit</button>
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
                staff : [],
                staff_id : null,
                user : [],
                surname : "",
                dni : ""
            }
        },
        methods:
            {
                formSubmit(e){
                    e.preventDefault();
                    let currentObj = this;
                    axios.post('/api/edit-staff', {
                        name: document.getElementById("name").value,
                        surname: document.getElementById("surname").value,
                        dni: document.getElementById("dni").value,
                        staff_id: document.getElementById("staff_id").value

                    }).then(function (response) {
                        console.log(response)
                        if(response){
                            if(response.data){
                                if(response.data.created == "staff_saved"){
                                    window.location = "/staff-list";
                                }else{
                                    window.location = "/new-staff";
                                }
                            }
                        }
                    })
                }
            },
        created(){
            this.staff_id = location.pathname.split('/')[2];
            axios.get('/api/staff/'+this.staff_id).then(response => this.staff = response.data);
        }
    }
</script>