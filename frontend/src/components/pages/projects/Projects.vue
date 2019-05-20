<template>
    <div :class="['page page-projects', {wide: isWide}]">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getProjectsText.name"></h2>
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
        props: {
            isWide: {
                type: Boolean,
                required: true,
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
        background: url(../../../assets/img/animation/animation-3.gif) no-repeat 90% 120%, url(../../../assets/img/animation/animation-1.gif) no-repeat 7% 50%, url(../../../assets/img/bg.jpg) repeat-x -300% center !important;
    }
</style>