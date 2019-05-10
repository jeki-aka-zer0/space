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
                name: null,
                email: null,
                message: null,
            }
        },
        methods: {
            ...mapActions([
                'contact',
            ]),
            send() {
                console.log(this.name, this.email, this.message);

                this.contact({
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