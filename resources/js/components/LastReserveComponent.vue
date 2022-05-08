<template>
<div>
    <p>{{last_template}}</p>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                last_reserve : []
            }
        },
        created(){
            axios.get('/api/last-reserve').then(response => this.last_reserve = response.data);
        }
    }
</script>