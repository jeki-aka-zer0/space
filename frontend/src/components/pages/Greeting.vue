<template>
    <div class="page">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getGreeting.name }}</h1>
            <p>{{ getGreeting.content }}</p>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../elements/Loader';

    const TEXT_SLUG = 'greeting';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getGreeting() {
                return this.getTextBySlug(TEXT_SLUG);
            },
        },
        components: {
            Loader
        }
    }
</script>