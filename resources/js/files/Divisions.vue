<template>
    <div class="card mt-4">
        <div class="card-header">Divisions</div>

        <div class="card-body">
            
        </div>
    </div>  
</template>

<script>
    export default {
        name: 'dashboard',
        computed: {
            welcome() {
                return this.$store.getters.welcome
            }
        }
    }
</script>