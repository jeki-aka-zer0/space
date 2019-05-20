<template>
    <div :class="['page page-about', {wide: isWide}]">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getAboutText.name"></h2>
                    <div class="page__content__description" v-html="getAboutText.content"></div>
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
        props: {
            isWide: {
                type: Boolean,
                required: true,
            },
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    @import "../../../assets/scss/media";

    .page-about {
        background: url(../../../assets/img/animation/animation-6.gif) no-repeat 10% 105%, url(../../../assets/img/animation/animation-2.gif) no-repeat 80% 60%, url(../../../assets/img/bg.jpg) repeat-x -100% center !important;

        .page__content__column {
            @include for-size('tablet-down') {
                &:nth-child(1) {
                    padding-right: 0;
                }
                &:nth-child(2) {
                    display: none;
                }
            }
        }
    }
</style>