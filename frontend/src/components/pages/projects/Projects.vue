<template>
    <div>
        <project v-for="project in getProjects" :project="project"/>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Project from "./Project";

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
            Project,
        },
    }
</script>