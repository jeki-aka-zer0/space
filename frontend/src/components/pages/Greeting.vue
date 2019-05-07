<template>
    <div class="page">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getGreeting.name }}</h1>
            <p>{{ getGreeting.content }}</p>
            <p>{{ getNavigation.content }}</p>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../elements/Loader';

    const SLUG_GREETING = 'greeting';
    const SLUG_NAVIGATION = 'navigation';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getGreeting() {
                return this.getTextBySlug(SLUG_GREETING);
            },
            getNavigation() {
                return this.getTextBySlug(SLUG_NAVIGATION);
            },
        },
        components: {
            Loader
        }
    }
</script>