<template>
    <div>
        <div  v-if="!current_user">
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
                  <div class="col-lg-10 mt-4">
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
    import guestbar from './auth/guestbar.vue';
    
    export default {
        name: 'appvue',
        components: {headerbar, sidebar, guestbar},
        methods: {
        },
        computed: {
            current_user() {
                return this.$store.getters.current_user
            }
        },
    };
</script>