<template>

    <form class="login" v-on:submit.prevent="login">

        <input type="text" placeholder="Email" v-model.trim="email">

        <input type="password" placeholder="Пароль" v-model.trim="password">

        <button class="button submit">login</button>

    </form>

</template>

<script>
    export default {
        data() {
            return {
                email: null,
                password: null,
            }
        },
        methods: {
            login() {
                this.$store
                    .dispatch('login', {
                        email: this.email,
                        password: this.password,
                    })
                    .then(() => {
                        this.$router.push({name: 'home'});
                    })
                    .catch(error => {
                        window.console.log(error.message);
                    });
            },
            logout() {
                this.$store
                    .dispatch('logout')
                    .then(() => {
                        this.$router.push({name: 'login'});
                    });
            }
        }
    }
</script>
