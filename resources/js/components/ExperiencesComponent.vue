<template>
    <!--<div v-for="experience in user.experiences">
        <form method="POST" action="/save-experience">
            @csrf
            <p class="mb-1" style="font-size: .77rem;">{{experience.reserve.date}}</p>
            <input type="text" name="commentary">
            <label for="floatingName">Commentary</label>
            <br>
            <input type="number" max="5" min="0" name="points">
            <label for="floatingName">Points</label>
            <br>
            <button class="btn btn-success ms-1" type="submit">Save</button>
        </form>
    </div>-->
    <hr>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                user : []
            }
        },
        created(){
            axios.get('/api/user/{auth()->user()->id}').then(response => this.user = response.data);
        }
    }
</script>
