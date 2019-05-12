<template>
    <div class="page page-greeting page-home">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="content">
                <h1>{{ getGreetingText.name }}</h1>
                <div v-html="getGreetingText.content"></div>
                <div v-html="getNavigation.content"></div>
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
    .page-greeting {
    }
</style>