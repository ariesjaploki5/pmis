<template>
    <div id="main">
        <Navbar/>
        <div class="content mt-5">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Header from './Header.vue';
import Navbar from './Navbar.vue';
    export default {
        name: 'main-app',
        components: {Navbar}
    }
</script>