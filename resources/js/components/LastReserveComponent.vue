<template>
    <div v-if="last_reserve" style="padding:20px;background-color:#696969;color:white;">
        <p v-if="last_reserve.email">Email: {{last_reserve.email}}</p>
        <p v-if="last_reserve.name">Name: {{last_reserve.name}}</p>
        <p v-if="last_reserve.country">Country: {{last_reserve.country}}</p>
        <p v-if="last_reserve.organization">Organization: {{last_reserve.organization}}</p>
        <p v-if="last_reserve.phone">Phone: {{last_reserve.phone}}</p>
        <p v-if="last_reserve.date">{{last_reserve.date}}</p>
        <p v-if="last_reserve.player_names">{{last_reserve.player_names}}</p>
        <p v-if="last_reserve.finished">Finished: 
            <span v-if="last_reserve.finished == '0'">No</span>
            <span v-if="last_reserve.finished == '1'">Yes</span>
        </p>
        <hr>
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
            axios.get('/api/last-reserve/'+window.user_id).then(response => this.last_reserve = response.data);
        }
    }
</script>