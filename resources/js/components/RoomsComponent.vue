<template>
    <div>
        <div class="row" style="display:inline-block;margin-right:10px;" v-for="image in room_images">
            <img :src="image" style="max-height:400px;max-width:500px;">
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
                room_images : []
            }
        },
        created(){
            axios.get('/api/room-images').then(response => this.room_images = response.data);
        }
    }
</script>