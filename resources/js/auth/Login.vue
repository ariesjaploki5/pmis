<template>
    <div class="login row justify-content-center mt-3">
        <div class="col-md-4">
            <div class="card rounded-0">
                
                <div class="card-body">
                    <div class="card-title text-center">
                        Login
                    </div>
                    <form @submit.prevent="authenticate">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" v-model="form.username" class="form-control rounded-0" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" v-model="form.password" class="form-control rounded-0" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Login" class="btn btn-primary btn-sm rounded-0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {login} from '../helpers/auth';
    export default {
        name: "login",
        data() {
            return {
                form: {
                    username: '',
                    password: ''
                },
                error: null
            };
        },
        methods: {
            authenticate() {
                this.$store.dispatch('login');
                login(this.$data.form)
                    .then((res) => {
                        this.$store.commit("loginSuccess", res);
                        this.$router.push({path: '/home'});
                    })
                    .catch((error) => {
                        this.$store.commit("loginFailed", {error});
                    });
            }
        },
        computed: {
            
        }
    }
</script>
