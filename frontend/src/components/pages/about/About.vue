<template>
    <div class="page page-about">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getAboutText.name"></h2>
                    <div v-html="getAboutText.content"></div>
                </div>

                <div class="page__content__column"></div>

            </div>
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../../elements/Loader';

    const SLUG_ABOUT = 'about';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getAboutText() {
                return this.getTextBySlug(SLUG_ABOUT);
            },
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    .page-about {
        background: url(../../../assets/img/bg.jpg) repeat-x -100% center !important;
    }
</style>