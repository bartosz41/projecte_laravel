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
                    <div class="row justify-content-around">
                        <div style="border:2px solid gray;margin-bottom: 20px;background-color:#D3D3D3;" class="col-md-2 d-flex" v-for="valoration in attr['valorations']">
                            <div>
                                <p class="fs-4">{{valoration.client_name}}</p>
                                <p class="fs-4" v-if="valoration.points == 1">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                </p>
                                <p class="fs-4" v-if="valoration.points == 2">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                </p>
                                <p class="fs-4" v-if="valoration.points == 3">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                </p>
                                <p class="fs-4" v-if="valoration.points == 4">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                </p>
                                <p class="fs-4" v-if="valoration.points == 5">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                    <img src="https://static.vecteezy.com/system/resources/previews/001/189/063/non_2x/star-rounded-png.png" style="height: 25px;width: 25px;">
                                </p>
                                <p class="fs-5">{{valoration.commentary}}</p>
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
