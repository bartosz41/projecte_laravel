<template>
  <form @submit="formSubmit">
  @csrf
  <div class="container" style="margin-top: 20px">
    <h1 class="text-light">Edit</h1>
    <hr>

    <input type="hidden" name="game_id" value="{{}}">

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="name" maxlength="50" class="form-control" value="" type="text">
        <label for="floatingName">Name</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="image" maxlength="300" class="form-control" value="" type="text">
        <label for="floatingName">Image (URL)</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="players" min="0" max="12" class="form-control" value="" type="text">
        <label for="floatingName">Players</label>
    </div>

    <div class="form-group form-floating mb-3" style="width:40%;">
        <input name="price" min="0" max="100" class="form-control" value="" type="text">
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
                game_id : null
            }
        },
        created(){
            this.game_id = location.pathname.split('/')[2];
            axios.get('/api/game/'+this.game_id).then(response => this.game = response.data);
        }
    }
</script>
