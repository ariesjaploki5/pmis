<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title">Dashboard</div>
                </div>
                <div class="col">

                </div>
            </div>
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    computed: {
            current_user() {
                return this.$store.getters.current_user;
            },
            access_level_id() {
                return this.$store.getters.current_user.access_level_id; 
            },
            employee_id() {
                return this.$store.getters.current_user.employee_id; 
            }
        },
}
</script>