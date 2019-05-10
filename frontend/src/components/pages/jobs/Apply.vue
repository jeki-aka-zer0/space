<template>
    <form class="login" v-on:submit.prevent="send">
        <input type="text" v-model="name" required>
        <input type="email" v-model="email" required>
        <textarea v-model="message">
        </textarea>

        <button>Отправить</button>
    </form>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        data() {
            return {
                name: /*null*/'Vasya',
                email: /*null*/'vasya@gmail.com',
                message: /*null*/'This is test message.' + (new Date).getTime(),
            }
        },
        methods: {
            ...mapActions([
                'contact',
            ]),
            send() {
                this
                    .$store
                    .dispatch('contact', {
                        name: this.name,
                        email: this.email,
                        message: this.message
                    })
                    .then(() => {
                        console.log('success');
                    })
                    .catch(error => {
                        console.log('error', error.message);
                    });
            },
        }
    }
</script>