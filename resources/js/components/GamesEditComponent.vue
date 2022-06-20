<template>
  <form @submit="formSubmit">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h1 class="text-light">Edit</h1>
    <hr>

    <input type="hidden" name="game_id" id="game_id" :value="game_id">

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" id="name" maxlength="50" :value="game.name" class="form-control" type="text">
        <label for="floatingName">Name</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" id="image" maxlength="300" :value="game.image" class="form-control" type="text">
        <label for="floatingName">Image (URL)</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="players" id="players" min="0" max="12" :value="game.players" class="form-control" type="text">
        <label for="floatingName">Players</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="price" id="price" min="0" max="100" :value="game.price" class="form-control" type="text">
        <label for="floatingName">Price (€)</label>
    </div>

    <button class="btn btn-lg btn-primary" style="width:20%;">Edit</button>
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
                game : [],
                game_id : null,
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
                    axios.post('/api/edit-game', {
                        name: document.getElementById("name").value,
                        players: document.getElementById("players").value,
                        price: document.getElementById("price").value,
                        image: document.getElementById("image").value,
                        game_id: document.getElementById("game_id").value
                    }).then(function (response) {
                        console.log(response)
                        if(response){
                            if(response.data){
                                if(response.data.created == "game_saved"){
                                    window.location = "/game-list";
                                }else{
                                    window.location = "/new-game";
                                }
                            }
                        }
                    })
                }
            },
        created(){
            this.game_id = location.pathname.split('/')[2];
            axios.get('/api/game/'+this.game_id).then(response => this.game = response.data);
        }
    }
</script>
