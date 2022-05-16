<template>

<form id="form" @submit="formSubmit">
  @csrf
  <div class="container">
    <h1 class="text-light">Create a game</h1>
    <hr>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" maxlength="50" v-model="name" class="form-control" type="text">
        <label for="floatingName">Name</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" maxlength="300" v-model="image" id="url" class="form-control" type="text">
        <label for="floatingName">Image (URL)</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="players" min="0" max="12" v-model="players" id="players" class="form-control" type="number">
        <label for="floatingName">Players</label>
    </div>
    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="price" min="0" max="100" v-model="price" id="price" class="form-control" type="number">
        <label for="floatingName">Price (€)</label>
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;">Create</button>
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
                players : "",
                price : "",
                image : "",
            }
        },
        methods:
            {
                formSubmit(e){
                    e.preventDefault();
                    let currentObj = this;
                    axios.post('/api/create-game', {
                        name: this.name,
                        players: this.players,
                        price: this.price,
                        image: this.image
                    }).then(function (response) {
                        console.log(response)
                        if(response){
                            if(response.data){
                                if(response.data.created == "game_created"){
                                    window.location = "/game-list";
                                }else{
                                    window.location = "/new-game";
                                }
                            }
                        }
                    })
                }
            }
    }
</script>
