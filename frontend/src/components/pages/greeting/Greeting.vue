<template>
    <div class="page page-home">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h1>{{ getGreetingText.name }}</h1>
                    <div v-html="getGreetingText.content" class="page__content__column__description"></div>
                    <div v-html="getNavigation.content"></div>
                    <svg class="icon icon-navigation">
                        <use xlink:href="#navigation"></use>
                    </svg>
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

    const SLUG_GREETING = 'greeting';
    const SLUG_NAVIGATION = 'navigation';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getGreetingText() {
                return this.getTextBySlug(SLUG_GREETING);
            },
            getNavigation() {
                return this.getTextBySlug(SLUG_NAVIGATION);
            },
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    .page-home {

        .page__content {
            height: 45vh;

            &__column {
                display: flex;
                flex-direction: column;
                justify-content: center;

                > div:nth-child(2) {
                    flex-grow: 3;
                }
            }
        }
    }

    .icon-navigation {
        margin-top: 10px;
        height: 40px;
        width: 58px;
    }
</style>