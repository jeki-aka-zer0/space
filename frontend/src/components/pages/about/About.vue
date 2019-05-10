<template>
    <div class="page page-about">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getAboutText.name }}</h1>
            <div v-html="getAboutText.content"></div>
        </div>
        <div class="loader-wrapper">
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