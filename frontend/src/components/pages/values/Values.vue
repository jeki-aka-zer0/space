<template>
    <div :class="['page page-values', {wide: isWide}]">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getValuesText.name"></h2>
                    <div class="page__content__description" v-html="getValuesText.content"></div>
                </div>

                <div class="page__content__column">
                    <div v-for="(value, index) in getValueItems" :key="index" class="value-item" v-html="value"></div>
                </div>

            </div>
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../../elements/Loader';

    const SLUG_VALUES = 'values';
    const SLUG_VALUE_ITEMS = 'value-items';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getValuesText() {
                return this.getTextBySlug(SLUG_VALUES);
            },
            getValueItems() {
                let values = this.getTextBySlug(SLUG_VALUE_ITEMS);

                if (typeof values === 'undefined') {
                    return [];
                }

                return values.content
                    .split(',')
                    .map(function (item) {
                        return item
                            .trim()
                            .replace(/<\/?[^>]+(>|$)/g, '');
                    });
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
    @import "../../../assets/scss/colors";
    @import "../../../assets/scss/media";
    @import "../../../assets/scss/variables";

    .page-values {
        background: url(../../../assets/img/animation/animation-7.gif) no-repeat 80% 100%, url(../../../assets/img/animation/animation-3.gif) no-repeat 20% 10%, url(../../../assets/img/bg.jpg) repeat-x -200% center !important;
    }

    .value-item {
        color: $light;
        font-weight: bold;
        opacity: $opacity;

        @include big-adaptive-font();

        &:hover {
            opacity: 1;
        }

        &:nth-child(even) {
            padding-left: 90px;
        }
    }
</style>