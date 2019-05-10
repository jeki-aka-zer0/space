<template>
    <div>
        <item v-for="job in getJobs" :job="job"/>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Item from "./Item";

    export default {
        created() {
            this.loadJobs();
        },
        computed: {
            ...mapGetters([
                'getJobs',
            ]),
        },
        methods: {
            ...mapActions([
                'loadJobs',
            ]),
        },
        components: {
            Item,
        },
    }
</script>