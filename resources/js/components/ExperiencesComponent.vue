<template>
    <div>
        
    </div>
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
            axios.get('/api/user/'+window.posts).then(response => this.user = response.data);
        }
    }
</script>