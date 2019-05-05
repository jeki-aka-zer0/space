<template>
    <div>
        <div v-if="name">
            <p>{{name}}</p>
            <p>{{version}}</p>
        </div>
        <div v-else>
            Loading...
        </div>
    </div>
</template>

<script>
    import http from '../http';

    export default {
        name: 'ApiStatus',
        data() {
            return {
                name: null,
                version: null
            }
        },
        mounted() {
            http.get('/').then(response => {
                this.name = response.data.name;
                this.version = response.data.version;
            });
        },
    }
</script>