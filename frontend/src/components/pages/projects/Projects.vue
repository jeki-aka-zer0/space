<template>
    <div class="page page-projects">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h1>{{ getProjectsText.name }}</h1>
                    <div v-html="getProjectsText.content"></div>
                </div>

                <div class="page__content__column">
                    <list/>
                </div>

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

<style lang="scss">
    .page-projects {
        background: url(../../../assets/img/bg.jpg) repeat-x -300% center !important;
    }
</style>