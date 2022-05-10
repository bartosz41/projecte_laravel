<template>
    <div class="container">
        <div class="row justify-content-center">
            <div v-for="attr in games_valorations" class="col-md-4 text-center" style="width: 100%;display:inline-block; border:1px solid black;margin-bottom:50px;">
                <p class="fs-2 fw-bold" style="padding-top:20px;">Game Information</p>
                <img :src="attr['game'].image" alt="Game" style="max-width:400px;max-height:300px;border:2px solid gray;">
                <p class="fs-3 fw-bold" style="padding-top:20px;">Name: {{attr['game'].name}}</p>
                <div class="fs-4">
                    <p>Max Players: {{attr['game'].players}}</p>
                    <p>Price: {{attr['game'].price}}€</p>
                </div>
                <br>
                <div>
                    <p class="fs-2 fw-bold" style="padding-top:20px;">Last valorations</p>
                    <span v-if="!attr['valorations'].length">There are no valorations yet.</span>
                    <div class="row justify-content-around" style="max-height:600px;">
                        <div class="h-100 container d-flex justify-content-center align-items-center col-md-2" style="border:2px solid gray;margin-bottom: 20px;background-color:#D3D3D3;" v-for="valoration in attr['valorations']">
                            <div class="card p-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="ratings">
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star rating-color"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <h5 class="review-count">{{valoration.client_name}}</h5>
                                <h6 class="review-count">{{valoration.commentary}}</h6>
                            </div>
                        </div>
                    </div>
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
                games_valorations : []
            }
        },
        created(){
            axios.get('/api/games').then(response => this.games_valorations = response.data);
        }
    }
</script>
