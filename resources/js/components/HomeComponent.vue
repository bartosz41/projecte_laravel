<template>
    <div class="container">
        <div class="row justify-content-center">
            <div v-for="game in games" class="col-md-4 text-center" style="width: 70%;display:inline-block; border:1px solid black;margin-bottom:50px;">
                <p class="fs-2 fw-bold" style="padding-top:20px;">Game Information</p>
                <p class="fs-3 fw-bold" style="padding-top:20px;">Name: {{game.name}}</p>
                <img :src="game.image" alt="Game" style="max-width:400px;max-height:300px;border:2px solid gray;">
                <div class="fs-4">
                    <p>Players: {{game.players}}</p>
                    <p>Price: {{game.price}}</p>
                </div>
                <br>
                <div>
                    <p class="fs-2 fw-bold" style="padding-top:20px;">Last valorations</p>
                    <!--<div v-for="valoration in game.valorations">
                        <div class="fs-4">
                            <p>{{valoration.client.name}}</p>
                            <p>{{valoration.comment}}</p>
                            <p>Points: {{valoration.points}}</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                games : []
            }
        },
        created(){
            axios.get('/api/games').then(response => this.games = response.data);
        }
    }
</script>
