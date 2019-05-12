<template>
    <div class="page page-projects">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="content">
                <h1>{{ getProjectsText.name }}</h1>
                <div v-html="getProjectsText.content"></div>
                <list/>
            </div>
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../../elements/Loader';
    import List from './List';

    const SLUG_PROJECTS = 'projects';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getProjectsText() {
                return this.getTextBySlug(SLUG_PROJECTS);
            },
        },
        components: {
            Loader,
            List,
        },
    }
</script>