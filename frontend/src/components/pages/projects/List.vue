<template>
    <div>
        <item v-for="project in getProjects" :project="project"/>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Item from "./Item";

    export default {
        created() {
            this.loadProjects();
        },
        computed: {
            ...mapGetters([
                'getProjects',
            ]),
        },
        methods: {
            ...mapActions([
                'loadProjects',
            ]),
        },
        components: {
            Item,
        },
    }
</script>