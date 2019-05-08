<template>
    <div class="page page-projects">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getProjects.name }}</h1>
            <div v-html="getProjects.content"></div>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../elements/Loader';

    const SLUG_PROJECTS = 'projects';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getProjects() {
                return this.getTextBySlug(SLUG_PROJECTS);
            },
        },
        components: {
            Loader
        }
    }
</script>