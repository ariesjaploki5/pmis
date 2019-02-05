<template>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <router-link class="navbar-brand" to="/">PMIS</router-link>


        </div>
    </nav>
</template>

<script>
    export default {
        name: 'guestbar',
        methods: {
            logout() {
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed: {
            current_user() {
                return this.$store.getters.current_user
            }
        }
    }
</script>