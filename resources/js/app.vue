<template>
    <div>
        <div  v-if="!currentUser">
            <guestbar></guestbar>
        </div>
        <div v-else>
            <headerbar></headerbar>
            <sidebar></sidebar>
        </div>
        
        <div class="content-wrapper">
            <div class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-10">
                    <router-view></router-view>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    import headerbar from './admin/header.vue';
    import sidebar from './admin/sidebar.vue';
    import guestbar from './auth/Guestbar.vue';
    
    export default {
        name: 'appvue',
        components: {headerbar, sidebar, guestbar},
        methods: {
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            }
        },
    };
</script>